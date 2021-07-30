<?php
class Profile
{
	private $login = '';
	private $name = '';
	private $email = '';
	private $phone = '';
	private $activity;
	private $receiveEmail;
	private $groups = [];
	private $strGroup;
	private $checkActivity;
	private $checkReceiveEmail;

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
		$this->strGroup = "Группы : " . implode(", ", $this->groups) . '.';
		$this->checkActivity = (boolval($this->activity) ? 'checked' : '');
		$this->checkReceiveEmail = (boolval($this->receiveEmail) ? 'checked' : '');
	}

	public function RenderProfileInfo()
	{
		$this->GetDataByUser();
		return [
			(new DivElement(''))
				->addElement(new PElement('', 'Login: ' . $this->login))
				->addElement(new PElement('', 'Name: ' . $this->name))
				->addElement(new PElement('', 'Email: ' . $this->email))
				->addElement(new PElement('', 'Phone: ' . $this->phone))
				->addElement(new PElement('', $this->strGroup))
				->addElement(new PElement('', '<br><br>'))
				->addElement(new CheckBoxElement('', '', '', true, $this->checkActivity, 'Activity: '))
				->addElement(new CheckBoxElement('', '', '', true, $this->checkReceiveEmail, 'Consent to receive email notifications: '))
		];
	}
}
