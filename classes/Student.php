<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LibraryManagement/utility/DBConnection.php';

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
            $sql = "SELECT * FROM students WHERE id = $editStudentId";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data['id'] = $row['id'];
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
            $id = $post['id'];
            $studentNumber = $post['updateStudentNumber'];
            $studentName = $post['studentName'];
            $course = $post['course'];
            $yearBlock = $post['yearBlock'];
            $address = $post['address'];

            $sql = "UPDATE students SET studentNumber = $studentNumber, studentName = '$studentName', course = '$course', yearBlock = '$yearBlock', address = '$address' WHERE id = $id";
            $result = $this->conn->query($sql);

            if($result){
                return json_encode(array('type' => 'success', 'message' => 'Student Details Updated.'));
            }else{
                return json_encode(array('type' => 'fail', 'message' => 'Student Datails Failed to Update.'));
            }
        }
        public function deleteStudent($deleteStudentId){
            $sql = "DELETE FROM students WHERE studentNumber = $deleteStudentId";
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

    if(isset($_POST['editStudentId'])) {
        $editStudent = $student->editStudent($_POST['editStudentId']);
        echo $editStudent;
    }
    
    if(isset($_POST['id'])){
        $updateStudent = $student->updateStudent($_POST);
        echo $updateStudent;
    }

    if(isset($_POST['deleteStudentId'])){
        $deleteBook = $student->deleteStudent($_POST['deleteStudentId']);
        echo $deleteBook;
    }

?>