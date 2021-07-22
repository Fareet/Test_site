<?php
require('/OpenServer/domains/task.manager3/classes/SQLConnection.php');

class SeeMessage
{
	private $arrKeys;
	private $header = "";
	private $date = "";
	private $text = "";
	private $senderName = "";
	private $senderMail = "";

	private function ReadMessage()
	{
		$this->arrKeys = $_GET['Page'];
		$sql = "SELECT m.*,u.name AS sender_name, u.email AS sender_email  FROM lessons.message AS m
		LEFT JOIN lessons.users AS u ON u.id = m.sender_id
		WHERE m.id = " . $this->arrKeys[0];
		foreach ((new DataBaseManager)->ExecuteRequest($sql) as $row) {
			$this->header = $row['header'];
			$this->date = $row['date_time'];
			$this->text = $row['report'];
			$this->senderName = $row['sender_name'];
			$this->senderMail = $row['sender_email'];
		}
		(new DataBaseManager)->ExecuteRequest("UPDATE lessons.message SET is_reading = '1' Where id = " . $this->arrKeys . ";");
	}

	public function WriteMessageForRead()
	{
		$this->ReadMessage();

		echo '<h1>' . $this->header . '</h1><br>';
		echo '<p> Время получения: ' . $this->date . '</p><br>';
		echo '<p> Сообщение: ' . $this->text . '</p><br>';
		echo '<p> Отправитель: ' . $this->senderName . "          " . $this->senderMail . '</p><br>';
	}
}


include $_SERVER['DOCUMENT_ROOT'] . '/templates /header.php';
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="left-collum-index">
			<p><? (new SeeMessage)->WriteMessageForRead() ?>
			<p>
		</td>
		<td class="right-collum-index">
			<div class="project-folders-menu">
				<ul class="project-folders-v">
					<?= Authorization() ?>
					<div class="clearfix"></div>
			</div>
		</td>
	</tr>
</table>
<? include $_SERVER['DOCUMENT_ROOT'] . './templates /footer.php' ?>