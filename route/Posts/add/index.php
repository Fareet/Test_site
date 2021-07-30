<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Message.php';
$addMessage = new AddMessage();

if (!empty($_POST)) {
	if (isset($_POST['Send'])) {
		$addMessage->SendMessage();
	} else {
		echo 'Невозможно отправить сообщение';
	}
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates /header.php';
?>
<html>

<body>
	<table width="50%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td class="left-collum-index">

				<h1>Сообщения</h1>

			</td>
		</tr>

		<form action='/route/Posts/add/' method="post" width="100%">
			<table border="4" cellspacing="0" cellpadding="0">
				<tr>
					<td class="iat">
						<label for="header">Заголовок</label>
						<input id="header" size="100" required name="header" value="">
					</td>
				</tr>
				<tr>
					<td class="iat">
						<label for="text">Текст сообщения:</label>
						<input id="text_id" size="50" required name="text" value="">
					</td>
				</tr>
				<tr>
					<td class="iat">
						<label for="password_id">Получатель:</label>
						<select name="addressee">
							<? $addMessage->PrintAddressee() ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="iat">
						<label for="section_id">Раздел сообщения:</label>
						<select name="sections">
							<? $addMessage->PrintSections() ?>
						</select>
					</td>
					<td class="iat">
						<label for="color_id">Цвет раздела:</label>
						<select name="color">
							<? $addMessage->PrintColors() ?>
						</select>
					</td>
				</tr>

				<tr>
					<td><input type="submit" value="Отправить" name="Send" float='right'></td>
				</tr>
			</table>
		</form>
	</table>
	<? include $_SERVER['DOCUMENT_ROOT'] . '/templates /footer.php' ?>