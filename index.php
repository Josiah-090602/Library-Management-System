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

  <script src="js/bootstrap.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<body>

<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand mx-3" href="#"><i class= " mx-2 fa-solid fa-book-open"></i>Library Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="mx-3 nav-link active" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="mx-3 nav-link active" href="#">Students</a>
        </li>
        <li class="nav-item">
          <a class="mx-3 nav-link" href="#">Borrowed</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="mt-3 container">
  <div class="row">
    <div class="col-md-12">
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
                      <button class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square editBookBtn" id="<?php echo $book['bookId']?>"></i></button>
                      <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash mr-2"></i></button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
        </div>
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
        <h1 class="modal-title fs-5" id="editLabel">Edit book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editBookform">
          <div class="form-group">
            <label for="bookTitle">Book Title</label>
            <input type="text" name="bookTitle" id="editBookTitle" class="form-control" required placeholder="Enter Title Here">
            <input type="hidden" name="bookId" id="bookId">
          </div>
          <div class="form-group">
            <label for="bookDesc">Book Description</label>
            <input type="text" name="bookDesc" id="bookDesc" class="form-control" required placeholder="Enter Description Here">
          </div>
          <div class= " form-group">
            <label for="author">Book Author</label>
            <input type="text" name="author" id="author" class="form-control" required placeholder="Enter Author Here">
          </div>
          <div class= "form-group">
            <label for="ISBN">ISBN</label>
            <input type="number" name="ISBN" id="ISBN" class="form-control" required placeholder="Enter ISBN Here">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="editBookBtn" type="button" class="btn btn-primary">Edit Book</button>
      </div>
    </div>
  </div>
</div>
<!-- Alert Modal -->
<div class="modal fade" id="addBookAlert" tabindex="-1" aria-labelledby="addBookLabel" aria-hidden="true">
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
    $('#addBookBtn').on('click', function() {
        $.post('classes/Book.php', $('form#addBookform').serialize(), function(data){
          var data  = JSON.parse(data);
          // console.log(data);

        if(data.type == 'success'){
          $('#addBook').modal('hide');
          $('#addBookAlert').modal('show');
          $('#addBookAlert .alert').addClass('alert-success').append(data.message).delay(500).fadeOut('slow',function(){
            location.reload();
          });
        }else{
          $('#addBook').modal('hide');
          $('#addBookAlert').modal('show');
          $('#addBookAlert .alert').addClass('alert-danger').append(data.message).delay(15000).fadeOut('slow',function(){
            location.reload();
          });
        }
        });
    });

    $('.editBookBtn').on('click', function(e) { 
      $('#editBookModal').modal('show');
        $.post('classes/Book.php', {editId: e.target.id}, function(data){
          var data  = JSON.parse(data);
          $('#editBookTitle').val(data.bookTitle);
          $('#bookDesc').val(data.bookDesc);
          $('#author').val(data.author);
          $('#ISBN').val(data.ISBN);
          
        });
    });
  });
</script>

</body>
</html>