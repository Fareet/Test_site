<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/AddNewPost.php';

if (!empty($_POST)) {
    (new AddNewPost())->Load();
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/image/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
    header('Location: /');
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates /header.php'
?>

<table width="40.6%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">
            <h1>Создание нового блога</h1>
        </td>
    </tr>
    <form action="#" method="post" width="100%" enctype="multipart/form-data">
        <table border="4" cellspacing="0" cellpadding="0">
            <tr>
                <td class="iat">
                    <label>Картинка</label>
                    <input type="file" name="image" accept=".jpg, .jpeg, .png">
                </td>
            </tr>
            <tr>
                <td class="iat">
                    <label for="title">Заголовок</label>
                    <input id="title" size="100" required name="blogTitle" value="">
                </td>
            </tr>
            <tr>
                <td class="iat">
                    <label for="text">Текст поста:</label>
                    <input id="text_id" required name="blogText" value="">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Отправить" name="Add"></td>
            </tr>
        </table>
    </form>
</table>
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/templates /footer.php' ?>