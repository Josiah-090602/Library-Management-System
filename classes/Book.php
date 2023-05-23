<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LibraryManagement/utility/DBConnection.php';

    class Book {
        public  $conn;

        public function __construct() {
            $db  = new DBConnection();
            $this->conn = $db->conn;
        }

        public function saveBook($post){
            $bookTitle = $post['bookTitle'];
            $bookDesc = $post['bookDesc'];
            $author = $post['author'];
            $ISBN = $post['ISBN']; 

            $sql = "INSERT INTO books (bookTitle, bookDesc, author, ISBN) VALUES ('$bookTitle', '$bookDesc', '$author', '$ISBN')";
            $result = $this->conn->query($sql);

            if($result){
                return json_encode(array('type' => 'success', 'message' => 'Book Saved'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Book Failed to Save'));
            }
        }
        
        public function getAllBooks(){
            $sql = "SELECT * FROM books";
            $result = $this->conn->query($sql);
            $books = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $books[] = $row;
                }
                return $books;
            }
        }

        public function editBook($editId){
            $sql = "SELECT * FROM books WHERE bookId = $editId";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data['bookId'] = $row['bookId'];
                    $data['bookTitle'] = $row['bookTitle'];
                    $data['bookDesc'] = $row['bookDesc'];
                    $data['author'] = $row['author'];
                    $data['ISBN'] = $row['ISBN'];
                }
                return json_encode($data);
            }
        }
    }

    $book = new Book();

    if  (isset($_POST['bookTitle'])) {

        $saveBook = $book->saveBook($_POST);
        echo $saveBook;
    }

    if(isset($_POST['editId'])) {
        $editBook = $book->editBook($_POST['editId']);
        echo $editBook;
    }

?>