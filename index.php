<?php
  include $_SERVER['DOCUMENT_ROOT'].'/LibraryManagement/classes/Book.php';

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
      <div class="nav flex-row nav-pills me-3" id="v-pills-tab" role="tablist">
        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Students</button>
        <button class="nav-link" id="v-pills-borrowed-tab" data-bs-toggle="pill" data-bs-target="#v-pills-borrowed" type="button" role="tab" aria-controls="v-pills-borrowed" aria-selected="false">Borrowed Books</button>
      </div>
    </div>
  </div>
</nav>

<div class="tab-content d-block pt-4" id="v-pills-tabContent">
<!-- Dashboard Section -->
<div class="tab-pane fade show active mx-5 mt-5 mb-4" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
  <div class="card">
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
                  <?php echo $book['author']; ?>
                </td>
                <td>
                  <?php echo $book['ISBN']; ?>
                </td>
                <td class="manage d-flex gap-2 justify-content-end">
                  <button class="btn btn-primary btn-sm editBookBtn" id="<?php echo $book['bookId'];?>" ><i class="fa-regular fa-pen-to-square"></i>Update</button>
                  <button class="btn btn-danger btn-sm deleteBookBtn" id="<?php echo $book['bookId'];?>" ><i class="fa-solid fa-trash mr-2"></i>Delete</button>
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
    </div>
  </div>
</div>

<!-- Students Section -->
<div class="tab-pane fade  mx-5 mt-5 mb-4" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
  <div class="card">
    <div class="header card-header d-flex justify-content-between align-items-center">
      <h5>List of Students</h5>
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
                  <?php echo $book['author']; ?>
                </td>
                <td>
                  <?php echo $book['ISBN']; ?>
                </td>
                <td class="manage d-flex gap-2 justify-content-end">
                  <button class="btn btn-primary btn-sm editBookBtn" id="<?php echo $book['bookId'];?>" ><i class="fa-regular fa-pen-to-square"></i>Update</button>
                  <button class="btn btn-danger btn-sm deleteBookBtn" id="<?php echo $book['bookId'];?>" ><i class="fa-solid fa-trash mr-2"></i>Delete</button>
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
    </div>
  </div>
</div>

<!-- Borrowed Section -->
<div class="tab-pane fade  mx-5 mt-5 mb-4" id="v-pills-borrowed" role="tabpanel" aria-labelledby="v-pills-borrowed-tab" tabindex="0">
  <div class="card">
    <div class="header card-header d-flex justify-content-between align-items-center">
      <h5>List of Borrowed Books</h5>
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
                  <?php echo $book['author']; ?>
                </td>
                <td>
                  <?php echo $book['ISBN']; ?>
                </td>
                <td class="manage d-flex gap-2 justify-content-end">
                  <button class="btn btn-primary btn-sm editBookBtn" id="<?php echo $book['bookId'];?>" ><i class="fa-regular fa-pen-to-square"></i>Update</button>
                  <button class="btn btn-danger btn-sm deleteBookBtn" id="<?php echo $book['bookId'];?>" ><i class="fa-solid fa-trash mr-2"></i>Delete</button>
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
    </div>
  </div>
</div>
</div>

<!-- Add Form Modal -->
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

<!-- Edit Form Modal -->
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

<!-- Alert Modal -->
<div class="modal fade" id="PopAlert" tabindex="-1" aria-labelledby="addBookLabel" aria-hidden="true">
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
        $.post('classes/Book.php', $('form#addBookform').serialize(), function(data){
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
        $.post('classes/Book.php', {editId: e.target.id}, function(data){
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
        $.post('classes/Book.php', $('form#editBookForm').serialize(), function(data){
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
        $.post('classes/Book.php', {deleteId: e.target.id}, function(data){
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