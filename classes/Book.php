<!-- Add Books Function -->
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/utility/DBconnection.php';

    class Book{
        public $conn;

        public function __construct(){
            $db = new DBconnection();
            $this->conn = $db->conn;
        }
    }
    $book = new Book();

    if(isset($_POST['bookTitle'])){
        echo "<pre>
        print_r($_POST);
        </pre>";
    }

?>