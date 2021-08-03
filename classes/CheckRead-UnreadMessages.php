<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/SQLConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/CheckAuthorization.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/NavigateMenu.php';
class Message
{
	private $addressee_id;
	private $groups;

	private function GetAddressee()
	{
		$sql = "SELECT u.*, g.name AS group_name FROM lessons.users AS u
		LEFT JOIN lessons.groups AS g ON u.id = g.user_id
		WHERE u.login = " . $_SESSION['login'];

		foreach ((new DataBaseManager)->ExecuteRequest($sql) as $row) {
			$this->addressee_id = $row['id'];
			$this->groups[] = $row['group_name'];
		}
	}
	private function GetMessageData()
	{
		$this->GetAddressee();
		return "SELECT m.*, s.name AS sections_name  FROM lessons.message as m
			LEFT JOIN lessons.sections AS s ON s.id = m.section_id
			WHERE m.addressee_id = " . $this->addressee_id;
	}

	public function GetUnReadMessages()
	{
		$unReadMessageBlock = new DivElement('');
		$sql = $this->GetMessageData();
		foreach ((new DataBaseManager)->ExecuteRequest($sql) as $row) {
			if ($row['is_reading'] == 0) {
				$unReadMessageBlock->addElement(new AElement('',"/Messages?Page=" . ($row['id'] + 1), $row['header'] . '  ' . $row['sections_name'] . '<br><br>'));
			}
		}
		return $unReadMessageBlock;
	}

	public function GetReadMessages()
	{
		$readMessageBlock = new DivElement('');
		$sql = $this->GetMessageData();
		foreach ((new DataBaseManager)->ExecuteRequest($sql) as $row) {
			if ($row['is_reading'] == 1) {
				$readMessageBlock->addElement(new AElement('',"/Messages?Page=" . ($row['id'] + 1), $row['header'] . '  ' . $row['sections_name'] . '<br><br>'));
			}

		}
		return $readMessageBlock;
	}
}
