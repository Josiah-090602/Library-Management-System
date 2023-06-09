<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LibraryManagement/utility/DBConnection.php';

    // Book Functions
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
        public function updateBook($post){
            $bookId = $post['bookId'];
            $bookTitle = $post['updateBookTitle'];
            $bookDesc = $post['bookDesc'];
            $author = $post['author'];
            $ISBN = $post['ISBN'];

            $sql = "UPDATE books SET bookTitle = '$bookTitle', bookDesc = '$bookDesc', author = '$author', ISBN= $ISBN WHERE bookId = $bookId";
            $result = $this->conn->query($sql);

            if($result){
                return json_encode(array('type' => 'success', 'message' => 'Book Details Updated.'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Book Datails Failed to Update.'));
            }
        }
        public function deleteBook($deleteId){
            $sql = "DELETE FROM books WHERE bookId = $deleteId";
            $execute = $this->conn->query($sql);
            
            if($execute){
                return json_encode(array('type' => 'success', 'message' => 'Details Deleted'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Unable to Delete Book Details'));
            }
        }
        public function borrowBookShow($addBorrowId){
            $sql = "SELECT * FROM books WHERE bookId = $addBorrowId";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data['bookId'] = $row['bookId'];
                    $data['bookTitle'] = $row['bookTitle'];
                }
                return json_encode($data);
            }
        }
        public function borrowBook($post){
            $borrowedBookTitle = $post['borrowedBookTitle'];
            $studentNumber = $post['studentNumber'];
            $studentName = $post['studentName'];
            $dateBorrowed = $post['dateBorrowed'];

            $sql = "INSERT INTO borrows (borrowedBookTitle, studentNumber, studentName, dateBorrowed) VALUES ('$borrowedBookTitle', '$studentNumber', '$studentName', '$dateBorrowed')";
            $result = $this->conn->query($sql);

            if($result){
                return json_encode(array('type' => 'success', 'message' => 'Book Borrowed Successfully'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Book Failed to Borrow'));
            }
        }
        
    }

    $book = new Book();

    if(isset($_POST['bookTitle'])) {

        $saveBook = $book->saveBook($_POST);
        echo $saveBook;
    }
    if(isset($_POST['editId'])) {
        $editBook = $book->editBook($_POST['editId']);
        echo $editBook;
    }
    if(isset($_POST['addBorrowId'])) {
        $borrowBookShow = $book->borrowBookShow($_POST['addBorrowId']);
        echo $borrowBookShow;
    }
    if(isset($_POST['borrowedBookTitle'])) {

        $borrowBook = $book->borrowBook($_POST);
        echo $borrowBook;
    }
    if(isset($_POST['bookId'])){
        $updateBook = $book->updateBook($_POST);
        echo $updateBook;
    }
    if(isset($_POST['deleteId'])){
        $deleteBook = $book->deleteBook($_POST['deleteId']);
        echo $deleteBook;
    }

    //Student Functions
    class Student {
        public  $conn;

        public function __construct() {
            $db  = new DBConnection();
            $this->conn = $db->conn;
        }

        public function saveStudent($post){
            $studentNumber = $post['studentNumber'];
            $studentName = $post['studentName'];
            $course = $post['course'];
            $yearBlock = $post['yearBlock']; 
            $studentAddress = $post['studentAddress'];

            $sql = "INSERT INTO students (studentNumber, studentName, course, yearBlock, studentAddress) VALUES ('$studentNumber', '$studentName', '$course', '$yearBlock', '$studentAddress')";
            $result = $this->conn->query($sql);

            if($result){
                return json_encode(array('type' => 'success', 'message' => 'Student Registered'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Failed to Register Student'));
            }
        }
        
        public function getAllStudents(){
            $sql = "SELECT * FROM students";
            $result = $this->conn->query($sql);
            $students = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $students[] = $row;
                }
                return $students;
            }
        }

        public function editStudent($editStudentId){
            $sql = "SELECT * FROM students WHERE studentId = $editStudentId";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data['studentId'] = $row['studentId'];
                    $data['studentNumber'] = $row['studentNumber'];
                    $data['studentName'] = $row['studentName'];
                    $data['course'] = $row['course'];
                    $data['yearBlock'] = $row['yearBlock'];
                    $data['studentAddress'] = $row['studentAddress'];
                }
                return json_encode($data);
            }
        }
        public function updateStudent($post){
            $studentId = $post['studentId'];
            $studentNumber = $post['updateStudentNumber'];
            $studentName = $post['studentName'];
            $course = $post['course'];
            $yearBlock = $post['yearBlock'];
            $studentAddress = $post['studentAddress'];

            $sql = "UPDATE students SET studentNumber = '$studentNumber', studentName = '$studentName', course = '$course', yearBlock = '$yearBlock', studentAddress = '$studentAddress' WHERE studentId = $studentId";
            $result = $this->conn->query($sql);

            if($result){
                return json_encode(array('type' => 'success', 'message' => 'Student Details Updated.'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Student Datails Failed to Update.'));
            }
        }
        public function deleteStudent($deleteStudentId){
            $sql = "DELETE FROM students WHERE studentId = $deleteStudentId";
            $execute = $this->conn->query($sql);
            
            if($execute){
                return json_encode(array('type' => 'success', 'message' => 'Details Deleted'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Unable to Delete Book Details'));
            }
        } 
    }

    $student = new Student();

    if(isset($_POST['studentNumber'])) {
        $saveStudent = $student->saveStudent($_POST);
        echo $saveStudent;
    }

    if(isset($_POST['editStudentId'])) {
        $editStudent = $student->editStudent($_POST['editStudentId']);
        echo $editStudent;
    }
    
    if(isset($_POST['studentId'])){
        $updateStudent = $student->updateStudent($_POST);
        echo $updateStudent;
    }

    if(isset($_POST['deleteStudentId'])){
        $deleteStudent = $student->deleteStudent($_POST['deleteStudentId']);
        echo $deleteStudent;
    }
    class Borrow {
        public  $conn;

        public function __construct() {
            $db  = new DBConnection();
            $this->conn = $db->conn;
        }

        public function getAllBorrow(){
            $sql = "SELECT * FROM borrows";
            $result = $this->conn->query($sql);
            $borrows = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $borrows[] = $row;
                }
                return $borrows;
            }
        }
    }
    
?>