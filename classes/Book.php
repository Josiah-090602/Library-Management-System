<?php
include $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/utility/DBConnection.php';

class Book {
    public $conn;

    public function __construct(){
        $db = new DBConnection();
        $this->conn = $db->conn;
    }

    public function saveBook($post) {
        $bookTitle = $post['bookTitle'];
        $bookDesc = $post['bookDesc'];
        $author = $post['author'];
        $ISBN = $post['ISBN']; 

        $sql = "INSERT INTO books (bookTitle, bookDesc, author, ISBN) VALUES ('$bookTitle', '$bookDesc', '$author', '$ISBN')";
        $result = $this->conn->query($sql);

        if($result) {
            return json_encode(array('type' => 'success', 'message' => 'Book saved successfully.'));
        } else {
            return json_encode(array('type' => 'fail', 'message' => 'Book saving failed.'));
        }
    }
}

$book = new Book();

if(isset($_POST['bookTitle'])){
    $saveBook = $book->saveBook($_POST);
    echo $saveBook;
}
?>