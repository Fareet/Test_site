<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/Redirect.php';

?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="/styles.css" rel="stylesheet">
	<title><?= $title ?> </title>
</head>

<body>
	<div class="header">
		<div class="logo"><img src="/image/logo.png" width="68" height="23" alt="Project"></div>
		<div class="clearfix"></div>
	</div>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td class="right-collum-index">

				<div class="project-folders-menu">
					<ul class="project-folders-v">
						<li class="project-folders-v-active"><a href="/route/Autorization/">Авторизация</a></li>
						<li><a href="#">Регистрация</a></li>
						<li><a href="#">Забыли пароль?</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="index-auth">
					<form action='/route/Autorization/?log_in' method="post">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="iat">
									<label for="login_id">Ваш логин:</label>
									<input id="login_id" size="30" name="login" value="<?= $lastLogin; ?>">
								</td>
							</tr>
							<tr>
								<td class="iat">
									<label for="password_id">Ваш пароль:</label>
									<input id="password_id" size="30" name="password" type="password" value="<?= $lastPassword ?>">
								</td>
							</tr>
							<tr>
								<td><input type="submit" value="Войти" name="Авторизация"></td>
							</tr>
						</table>
					</form>
				</div>
			</td>
		</tr>
	</table>
</body>

</html>