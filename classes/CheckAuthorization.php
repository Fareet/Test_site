<?php
function accountExit()
{
	if (isset($_GET['log_out'])) {
		session_destroy();
		header("Refresh:0; url= /");
	}
}
function Authorization()
{
	$success = (new Authorization)->Log_in();
	if ($success) {
		return (new LIElement('project-folders-v-active'))
			->addElement((new AElement('', '/?log_out', 'Выход')));
	} else {
		return (new LIElement('project-folders-v-active'))
			->addElement((new AElement('', '/route/Authorization/', 'Авторизация')));
	}
}
