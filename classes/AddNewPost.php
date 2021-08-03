<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/SQLConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/CheckAuthorization.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/NavigateMenu.php';
class AddNewPost
{
    private $title;
    private $text;
    private $image;
    private $date;
    private $conn;

    public function __construct()
    {
        $this->title = $_POST['blogTitle'];
        $this->text = $_POST['blogText'];
        $this->image = $_FILES['image']['name'];
        $this->date = date('Y-m-d');
        $this->conn = (new DataBaseManager)->GetConnection();
    }
    public function Load()
    {
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            (new DataBaseManager)->ExecuteRequest("INSERT INTO blog.blog (title, text, image, date_time) VALUES ('$this->title', '$this->text', '$this->image', '$this->date')");
        }
    }
}
