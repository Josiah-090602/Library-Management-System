<?php
  include $_SERVER['DOCUMENT_ROOT'].'/LibraryManagement/classes/Functions.php';

  $db = new DBConnection(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/d68d9e7151.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
<body>

<nav class="navbar fixed-top navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand mx-3" href="#"><i class= " mx-2 fa-solid fa-book-open"></i>Library Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav nav-pills nav-underline gap-4 mx-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dashboard</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Students</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-borrow-tab" data-bs-toggle="pill" data-bs-target="#pills-borrow" type="button" role="tab" aria-controls="pills-borrow" aria-selected="false">Borrowed</button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="tab-content" id="pills-tabContent">
<!-- Dashboard Section -->
<div class="tab-pane fade show active mt-5 mx-5 my-4 pt-5" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
  <div class="card ">
    <div class="header card-header d-flex justify-content-between align-items-center">
      <h5>List of Books</h5>
      <div class="btn-con">
        <button class="btn btn-success " data-bs-toggle="modal" data-bs-target="#addBook">Add Book</button>
      </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Book ID</th>
              <th scope="col">Title</th>
              <th scope="col">Book Decription</th>
              <th scope="col">Author</th>
              <th scope="col">ISBN</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
                
                $bookObj = new Book();
                $books = $bookObj->getAllBooks();
                $no = 0;
                foreach ($books as $book):
                  $no++;
            ?>
        
              <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td>
                  <?php echo $book['bookTitle']; ?>
                </td>
                <td>
                  <?php echo $book['bookDesc']; ?>
                </td>
                <td>
                  <?php echo $book['author']; ?>
                </td>
                <td>
                  <?php echo $book['ISBN']; ?>
                </td>
                <td class="manage d-flex gap-2 justify-content-end">
                  <button class="btn btn-primary btn-sm borrowBookBtn" id="<?php echo $book['bookId'];?>" >Borrow Book</button>
                  <button class="btn btn-primary btn-sm editBookBtn" id="<?php echo $book['bookId'];?>" >Update</button>
                  <button class="btn btn-danger btn-sm deleteBookBtn" id="<?php echo $book['bookId'];?>" >Delete</button>
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
    </div>
  </div>
</div>

<!-- Students Section -->
<div class="tab-pane fade mt-5 mx-5 my-4 pt-5" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
  <div class="card">
    <div class="header card-header d-flex justify-content-between align-items-center">
      <h5>List of Students</h5>
      <div class="btn-con">
        <button class="btn btn-success " data-bs-toggle="modal" data-bs-target="#addStudent">Add Student</button>
      </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Student Number</th>
              <th scope="col">Student Name</th>
              <th scope="col">Course</th>
              <th scope="col">Year and Block</th>
              <th scope="col">Address</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
                
                $studentObj = new Student();
                $students = $studentObj->getAllStudents();
                $no = 0;
                foreach ($students as $student):
                  $no++;
            ?>
        
              <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td>
                  <?php echo $student['studentNumber']; ?>
                </td>
                <td>
                  <?php echo $student['studentName']; ?>
                </td>
                <td>
                  <?php echo $student['course']; ?>
                </td>
                <td>
                  <?php echo $student['yearBlock']; ?>
                </td>
                <td>
                  <?php echo $student['studentAddress']; ?>
                </td>
                <td class="manage d-flex gap-2 justify-content-end">
                  <button class="btn btn-primary btn-sm editStudentBtn" id="<?php echo $student['studentId'];?>" >Update</button>
                  <button class="btn btn-danger btn-sm deleteStudentBtn" id="<?php echo $student['studentId'];?>" >Delete</button>
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
    </div>
  </div>
</div>

<!-- Borrowed Section -->
<div class="tab-pane fade mt-5 mx-5 my-4 pt-5" id="pills-borrow" role="tabpanel" aria-labelledby="pills-borrow-tab" tabindex="0">
  <div class="card">
    <div class="header card-header d-flex justify-content-between align-items-center">
      <h5>List of Borrowed Books</h5>
    </div>
    <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Book Title</th>
              <th scope="col">Student Number</th>
              <th scope="col">Name</th>
              <th scope="col">Date Borrowed</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
                
                $borrowObj = new Borrow();
                $borrows = $borrowObj->getAllBorrow();
                $no = 0;
                foreach ($borrows as $borrow):
                  $no++;
            ?>
        
              <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td>
                  <?php echo $borrow['borrowedBookTitle']; ?>
                </td>
                <td>
                  <?php echo $borrow['studentNumber']; ?>
                </td>
                <td>
                  <?php echo $borrow['studentName']; ?>
                </td>
                <td>
                  <?php echo $borrow['dateBorrowed']; ?>
                </td>
                <td class="manage d-flex gap-2 justify-content-end">
                  <button class="btn btn-primary btn-sm " id="<?php echo $borrow['borrowId'];?>">Return</button>
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
    </div>
  </div>
</div>
</div>

<!-- Add Book Form Modal -->
<div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="addBookLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addBookLabel">Add new book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addBookform">
          <div class="form-group">
            <label for="bookTitle">Book Title</label>
            <input type="text" name="bookTitle" class="form-control" required placeholder="Enter Title Here">
          </div>
          <div class="form-group">
            <label for="bookDesc">Book Description</label>
            <input type="text" name="bookDesc" class="form-control" required placeholder="Enter Destription Here">
          </div>
          <div class= " form-group">
            <label for="author">Book Author</label>
            <input type="text" name="author" class="form-control" required placeholder="Enter Author Here">
          </div>
          <div class= "form-group">
            <label for="ISBN">ISBN</label>
            <input type="number" name="ISBN" class="form-control" required placeholder="Enter ISBN Here">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="addBookBtn" type="button" class="btn btn-primary">Add Book</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Book Form Modal -->
<div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editBookLabel">Edit Book Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editBookForm">
          <div class="form-group">
            <label for="bookTitle">Book Title</label>
            <input type="text" name="updateBookTitle" id="editBookTitle" class="form-control" required placeholder="Enter Title Here">
            <input type="hidden" name="bookId" id="bookId">
          </div>
          <div class="form-group">
            <label for="bookDesc">Book Description</label>
            <input type="text" name="bookDesc" id="bookDesc" class="form-control" required placeholder="Enter Destription Here">
          </div>
          <div class= " form-group">
            <label for="author">Book Author</label>
            <input type="text" name="author" id="author" class="form-control" required placeholder="Enter Author Here">
          </div>
          <div class= "form-group">
            <label for="ISBN">ISBN</label>
            <input type="number" name="ISBN" id="ISBN" class="form-control" required placeholder="Enter ISBN Here">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary updateBookBtn" id="updateBook" name="updateBtn">Save Changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Add Student Form Modal -->
<div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="addStudentLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addStudentLabel">Register New Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addStudentForm">
          <div class="form-group">
            <label for="studentNumber">Student Number</label>
            <input type="text" name="studentNumber" class="form-control" required placeholder="Enter Number Here">
          </div>
          <div class="form-group">
            <label for="studentName">Full Name</label>
            <input type="text" name="studentName" class="form-control" required placeholder="Enter Name Here">
          </div>
          <div class="form-group">
            <label for="course">Course</label>
            <input type="text" name="course" class="form-control" required placeholder="Enter Course Here">
          </div>
          <div class="form-group">
            <label for="yearBlock">Year and Block</label>
            <input type="text" name="yearBlock" class="form-control" required placeholder="Enter Year and Block Here">
          </div>
          <div class="form-group">
            <label for="studentAddress">Address</label>
            <input type="text" name="studentAddress" class="form-control" required placeholder="Enter Address Here">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="addStudentBtn" type="button" class="btn btn-primary">Register New Student</button>
      </div>
    </div>
  </div>
</div>

<!-- Borrow Book Form Modal -->
<div class="modal fade" id="borrowBook" tabindex="-1" aria-labelledby="borrowBookLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="borrowBookLabel">Borrow Book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="borrowBookForm">
          <div class="form-group">
            <label for="borrowedBookTitle">Book Title</label>
            <input type="text" name="borrowedBookTitle" id="borrowedBookTitle" class="form-control" required placeholder="Enter Title Here">
            <input type="hidden" name="bookId" id="bookId">
          </div>
          <div class="form-group">
            <label for="studentNumber">Student Number</label>
            <input type="text" name="studentNumber" id="studentNumber" class="form-control" required placeholder="Enter Destription Here">
          </div>
          <div class= " form-group">
            <label for="studentName">Student Name</label>
            <input type="text" name="studentName" id="studentName" class="form-control" required placeholder="Enter Author Here">
          </div>
          <div class= "form-group">
            <label for="dateBorrowed">Date</label>
            <input type="date" name="dateBorrowed" id="dateBorrowed" class="form-control" required placeholder="Enter ISBN Here">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="borrowBookBtn" type="button" class="btn btn-primary">Borrow</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Student Form Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="addStudentLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editStudentLabel">Edit Student Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editStudentForm">
          <div class="form-group">
            <label for="studentNumber">Student Number</label>
            <input type="text" name="updateStudentNumber" id="editStudentNumber" class="form-control" required placeholder="Enter Number Here">
            <input type="hidden" name="studentId" id="studentId">
          </div>
          <div class="form-group">
            <label for="studentName">Full Name</label>
            <input type="text" name="studentName" id="studentName" class="form-control" required placeholder="Enter Name Here">
          </div>
          <div class= " form-group">
            <label for="course">Course</label>
            <input type="text" name="course" id="course" class="form-control" required placeholder="Enter Course Here">
          </div>
          <div class= "form-group">
            <label for="yearBlock">Year and Block</label>
            <input type="text" name="yearBlock" id="yearBlock" class="form-control" required placeholder="Enter Year and Block Here">
          </div>
          <div class= "form-group">
            <label for="studentAddress">Address</label>
            <input type="text" name="studentAddress" id="address" class="form-control" required placeholder="Enter Address">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="updateStudentBtn" type="button" class="btn btn-primary">Update Student Details</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Alert Modal -->
<div class="modal fade" id="PopAlert" tabindex="-1" aria-labelledby="borrowBookLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="alertModal">Alert</h1>

      </div>
      <div class="modal-body">
          <div class="alert"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Add Book Functionality
    $('#addBookBtn').on('click', function() {
        $.post('classes/Functions.php', $('form#addBookform').serialize(), function(data){
          var data  = JSON.parse(data);
          // console.log(data);

        if(data.type == 'success'){
          $('#addBook').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-success').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }else{
          $('#addBook').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-danger').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }
      });
    });
    // Edit Book Button Function
    $('.editBookBtn').on('click', function(e) {
      $('#editBookModal').modal('show');
        $.post('classes/Functions.php', {editId: e.target.id}, function(data){
          var data  = JSON.parse(data);
          // console.log(data);
          $('#bookId').val(data.bookId);
          $('#editBookTitle').val(data.bookTitle);
          $('#bookDesc').val(data.bookDesc);
          $('#author').val(data.author);
          $('#ISBN').val(data.ISBN);

      });
    });
    // Edit Book Functionality
    $('#updateBook').on('click', function() {
        $.post('classes/Functions.php', $('form#editBookForm').serialize(), function(data){
          var data  = JSON.parse(data);

        if(data.type == 'success'){
          $('#editBookModal').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-success').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }else{
          $('#editBookModal').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-danger').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }
      });
    });
    //Delete Book Function
    $('.deleteBookBtn').on('click', function(e){
      var deleteConfirm = confirm("Are you sure you want to delete this book?");
      if(deleteConfirm){
        $.post('classes/Functions.php', {deleteId: e.target.id}, function(data){
        var data  = JSON.parse(data);
        
        if(data.type == 'success'){
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-success').append(data.message).delay(500).fadeOut('slow',function(){
            location.reload();
          });
        }else{
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-danger').append(data.message).delay(500).fadeOut('slow',function(){
            location.reload();
          });
        }
      });
      }else{
        return false;
      }    
    });



    // Borrow Book Button Function
    $('.borrowBookBtn').on('click', function(e) {
      $('#borrowBook').modal('show');
        $.post('classes/Functions.php', {addBorrowId: e.target.id}, function(data){
          var data  = JSON.parse(data);
          // console.log(data);
          $('#bookId').val(data.bookId);
          $('#borrowedBookTitle').val(data.bookTitle);
      });
    });
    $('#borrowBookBtn').on('click', function() {
        $.post('classes/Functions.php', $('form#borrowBookForm').serialize(), function(data){
          var data  = JSON.parse(data);
          // console.log(data);

        if(data.type == 'success'){
          $('#borrowBook').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-success').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }else{
          $('#borrowBook').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-danger').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }
      });
    });





    // Add Student Functionality
    $('#addStudentBtn').on('click', function() {
        $.post('classes/Functions.php', $('form#addStudentForm').serialize(), function(data){
          var data  = JSON.parse(data);
          // console.log(data);

        if(data.type == 'success'){
          $('#addStudent').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-success').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }else{
          $('#addStudent').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-danger').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }
      });
    });
    // Edit Student Button Function
    $('.editStudentBtn').on('click', function(e) {
      $('#editStudentModal').modal('show');
        $.post('classes/Functions.php', {editStudentId: e.target.id}, function(data){
          var data  = JSON.parse(data);
          // console.log(data);
          $('#studentId').val(data.studentId);
          $('#editStudentNumber').val(data.studentNumber);
          $('#studentName').val(data.studentName);
          $('#course').val(data.course);
          $('#yearBlock').val(data.yearBlock);
          $('#studentAddress').val(data.studentAddress);
      });
    });
    // Edit Student Functionality
    $('#updateStudentBtn').on('click', function() {
        $.post('classes/Functions.php', $('form#editStudentForm').serialize(), function(data){
          var data  = JSON.parse(data);

        if(data.type == 'success'){
          $('#editStudentModal').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-success').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }else{
          $('#editStudentModal').modal('hide');
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-danger').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }
      });
    });
    // Delete Student Functionality
    $('.deleteStudentBtn').on('click', function(e){
      var deleteConfirm = confirm("Are you sure you want to delete this student?");
      if(deleteConfirm){
        $.post('classes/Functions.php', {deleteStudentId: e.target.id}, function(data){
        var data  = JSON.parse(data);
        
        if(data.type == 'success'){
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-success').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }else{
          $('#PopAlert').modal('show');
          $('#PopAlert .alert').addClass('alert-danger').append(data.message).delay(1500).fadeOut('slow',function(){
            location.reload();
          });
        }
      });
      }else{
        return false;
      }
    });



  });
</script>

</body>
</html>