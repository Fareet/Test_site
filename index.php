<?php

require('/OpenServer/domains/task.manager3/classes/PrintAllPostsInMainMenu.php');

include $_SERVER['DOCUMENT_ROOT'] . '/templates /header.php';

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="left-collum-index">
			<h1>Возможности проекта —</h1>
			<p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>
			<div class=blog>
				<? (new PrintAllPostsInMainMenu())->GetInformationAboutAllPosts() ?>
			</div>
		</td>
		<td class="right-collum-index">
			<div class="project-folders-menu">
				<form method="post">
					<ul class="project-folders-v">
						<?= Authorization() ?>
						<li><a href="#">Регистрация</a></li>
						<li><a href="#">Забыли пароль?</a></li>
					</ul>
				</form>
				<div class="clearfix"></div>
			</div>
			<a class='addInBlog' href='/include/CreatePost.php'>Добавить пост</a>
		</td>
	</tr>

</table>

<? include $_SERVER['DOCUMENT_ROOT'] . './templates /footer.php' ?>