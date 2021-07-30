<?php
class AddMessage
{
	private $addressee = [];
	private $senderID;
	private $sections = [];
	private $colors = [];
	private $addresseeID;
	private $sectionsID;

	private function GetAddressees()
	{
		$sql = "SELECT u.* FROM lessons.users AS u
			WHERE u.login != " . $_SESSION['login'];

		foreach ((new DataBaseManager)->ExecuteRequest($sql) as $row) {
			$this->addressee[] = $row['login'];
		}
	}
	private function GetSender()
	{
		$sql = "SELECT u.*, g.name AS group_name FROM lessons.users AS u
			LEFT JOIN lessons.groups AS g ON u.id = g.user_id
			WHERE u.login = " . $_SESSION['login'];

		foreach ((new DataBaseManager)->ExecuteRequest($sql) as $row) {
			$this->senderID = $row['id'];
		}
	}
	private function GetSectionAndColors()
	{
		$sql = "SELECT s.*, c.name AS sections_color FROM lessons.sections AS s
			LEFT JOIN lessons.colors AS c ON s.color_id = c.id;";
		foreach ((new DataBaseManager)->ExecuteRequest($sql) as $row) {
			$this->sections[] = $row['name'];
			$this->colors[] = $row['sections_color'];
		}
	}
	private function GetAddresseeID()
	{
		$row = (new DataBaseManager)->getRow('lessons.users', " WHERE lessons.users.login = " . $_POST['addressee']);
		$this->addresseeID = $row['id'];
	}
	private function SectionsID()
	{
		$row = (new DataBaseManager)->getRow('lessons.sections', " WHERE lessons.sections.name = '" . $_POST['sections'] . "'");
		$this->sectionsID = $row['id'];
	}


	public function PrintAddressee()
	{
		$this->GetAddressees();
		foreach ($this->addressee as $key) {
			echo '<option  value = ' . $key . '>' . $key . '</option>';
		}
	}
	public function PrintSections()
	{

		$this->GetSectionAndColors();
		foreach ($this->sections as $section) {
			echo '<option>' . $section . '</option>';
		}
	}
	public function PrintColors()
	{
		foreach ($this->colors as $color) {
			echo '<option>' . $color . '</option>';
		}
	}
	private function GetDataForSendMessage()
	{
		$this->GetSender();
		$this->GetAddresseeID();
		$this->SectionsID();
	}
	public function SendMessage()
	{
		$text = $_POST['text'];
		$title = $_POST['header'];
		$data = date('Y-m-d H:i:s');
		$this->GetDataForSendMessage();
		$sql = "INSERT INTO lessons.message (report, header, date_time, sender_id, addressee_id, section_id, is_reading)
			VALUES ('$text', '$title', '$data', '$this->senderID', '$this->addresseeID', '$this->sectionsID' , '0')";
		if ((new DataBaseManager)->ExecuteRequest($sql) == []) {
			header("Location: /route/Posts/");
		} else {
			echo "<p style= color:white;>Error: Не удалось занести данные в базу данных." . $sql . "</p>";
		}
	}
}
