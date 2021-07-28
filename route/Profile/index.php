<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/SQLConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/CheckAuthorization.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/main_menu.php';

class Profile
{
	private $login = '';
	private $name = '';
	private $email = '';
	private $phone = '';
	private $activity;
	private $receiveEmail;
	private $groups = [];

	private function GetDataByUser()
	{
		$sql = "SELECT u.*, g.name AS group_name FROM lessons.users AS u
		LEFT JOIN lessons.groups AS g ON u.id = g.user_id
		WHERE u.login =" . $_SESSION['login'];

		foreach ((new DataBaseManager)->ExecuteRequest($sql) as $row) {
			$this->login = $row['login'];
			$this->name = $row['name'];
			$this->email = $row['email'];
			$this->phone = $row['phone'];
			$this->activity = $row['activity'];
			$this->receiveEmail = $row['consent_to_receive_email_notifications'];
			$this->groups[] = $row['group_name'];
		}
	}

	public function PrintUserData()
	{
		$this->GetDataByUser();
		$strGroup = "Группы : ";
		$strGroup .= implode(", ", $this->groups) . '.';
		$checkActivity = (boolval($this->activity) ? 'checked' : '');
		$checkReceiveEmail = (boolval($this->receiveEmail) ? 'checked' : '');

		echo 'Login: ' . $this->login . '<br>';
		echo 'Name: ' . $this->name . '<br>';
		echo 'Email: ' . $this->email . '<br>';
		echo 'Phone: ' . $this->phone . '<br>';
		echo ($strGroup . '<br>');
		echo '<br>' . '<br>' . '<br>' . '<br>' . '<br>';
		echo 'Activity: ' . "<input type='checkbox' disabled=true " . $checkActivity . ">" . '<br>';
		echo 'Consent to receive email notifications: ' . "<input type='checkbox' disabled=true "  . $checkReceiveEmail . ">" . '<br>';
	}
}


include $_SERVER['DOCUMENT_ROOT'] . '/templates /header.php';
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="left-collum-index">
			<h1>Профиль</h1>
			<p><? (new Profile)->PrintUserData() ?>
		</td>
		<td class="right-collum-index">
			<div class="project-folders-menu">
				<ul class="project-folders-v">
					<? Authorization() ?>
					<div class="clearfix"></div>
			</div>
		</td>
	</tr>
</table>
<? include $_SERVER['DOCUMENT_ROOT'] . './templates /footer.php' ?>