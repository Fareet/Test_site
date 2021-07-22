<?php

include $_SERVER['DOCUMENT_ROOT'] . '/classes/Message.php';

include $_SERVER['DOCUMENT_ROOT'] . '/templates /header.php';
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="left-collum-index">

			<h1>Новые сообщения</h1>
			<p><? (new Message)->GetUnReadMessages() ?></p>

		</td>
		<td class="left-collum-index">

			<h1>Прочитанные сообщения</h1>
			<p><? (new Message)->GetReadMessages() ?></p>
		</td>
		<td class="left-collum-index">

			<h1>Новое сообщение</h1>
			<button> <a href="/route/Posts/add">Написать сообщение </a></button>
		</td>
	</tr>
	</tr>
</table>
<? include $_SERVER['DOCUMENT_ROOT'] . '/templates /footer.php' ?>