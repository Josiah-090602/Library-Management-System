<?php
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
            $address = $post['address'];

            $sql = "INSERT INTO students (studentNumber, studentName, course, yearBlock, address) VALUES ('$studentNumber', '$studentName', '$course', '$yearBlock', '$address')";
            $result = $this->conn->query($sql);

            if($result){
                return json_encode(array('type' => 'success', 'message' => 'Book Saved'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Book Failed to Save'));
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

        public function editStudent($editId){
            $sql = "SELECT * FROM students WHERE studentNumber = $editId";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data['studentId'] = $row['studentId'];
                    $data['studentNumber'] = $row['studentNumber'];
                    $data['studentName'] = $row['studentName'];
                    $data['course'] = $row['course'];
                    $data['yearBlock'] = $row['yearBlock'];
                    $data['address'] = $row['address'];
                }
                return json_encode($data);
            }
        }
        public function updateStudent($post){
            $studentNumber = $post['updateStudentName'];
            $studentName = $post['studentName'];
            $course = $post['course'];
            $yearBlock = $post['yearBlock'];
            $address = $post['address'];

            $sql = "UPDATE students SET studentNumber = $studentNumber, studentName = '$studentName', course = '$course', yearBlock = $yearBlock, address = '$address' WHERE studentNumber = $studentNumber";
            $result = $this->conn->query($sql);

            if($result){
                return json_encode(array('type' => 'success', 'message' => 'Book Details Updated.'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Book Datails Failed to Update.'));
            }
        }
        public function deleteStudent($deleteId){
            $sql = "DELETE FROM students WHERE studentNumber = $deleteId";
            $execute = $this->conn->query($sql);
            
            if($execute){
                return json_encode(array('type' => 'success', 'message' => 'Details Deleted'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Unable to Delete Book Details'));
            }
        } 
    }

    $student = new Student();

    if  (isset($_POST['studentNumber'])) {

        $saveStudent = $student->saveStudent($_POST);
        echo $saveStudent;
    }

    if(isset($_POST['editId'])) {
        $editBook = $student->editStudent($_POST['editId']);
        echo $editBook;
    }
    
    if(isset($_POST['bookId'])){
        $updateStudent = $student->updateStudent($_POST);
        echo $updateStudent;
    }

    if(isset($_POST['deleteId'])){
        $deleteBook = $student->deleteStudent($_POST['deleteId']);
        echo $deleteBook;
    }

?>