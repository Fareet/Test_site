<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates /header.php';

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="left-collum-index">

			<h1>Каталог</h1>
			<p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>

		</td>
		<td class="right-collum-index">

			<div class="project-folders-menu">
				<ul class="project-folders-v">
					<?= Authorization() ?>
					<li><a href="#">Регистрация</a></li>
					<li><a href="#">Забыли пароль?</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

		</td>
	</tr>
</table>
<? include $_SERVER['DOCUMENT_ROOT'] . './templates /footer.php' ?>