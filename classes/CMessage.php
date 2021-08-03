<?php

class CMessage
{
	private $arrKeys;
	private $header = "";
	private $date = "";
	private $text = "";
	private $senderName = "";
	private $senderMail = "";

	private function CollectDataOfMessage($id)
	{
		$sql = "SELECT m.*,u.name AS sender_name, u.email AS sender_email  FROM lessons.message AS m
		LEFT JOIN lessons.users AS u ON u.id = m.sender_id
		WHERE m.id = " . ($id - 1) ;
		foreach ((new DataBaseManager)->ExecuteRequest($sql) as $row) {
			$this->header = $row['header'];
			$this->date = $row['date_time'];
			$this->text = $row['report'];
			$this->senderName = $row['sender_name'];
			$this->senderMail = $row['sender_email'];
		}
		(new DataBaseManager)->ExecuteRequest("UPDATE lessons.message SET is_reading = '1' Where id = " . ($id - 1) . ";");
	}

	public function GetObject($id)
	{
		$this->CollectDataOfMessage($id);
        return (new DivElement(''))
            ->addElement(new H1Element('',$this->header))
            ->addElement(new PElement('','Время получения: ' . $this->date))
            ->addElement(new PElement('','Сообщение: ' . $this->text))
            ->addElement(new PElement('','Отправитель: ' .  $this->senderName . "          " . $this->senderMail))
        ;
	}
}