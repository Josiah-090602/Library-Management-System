<?php
  include 'utility/DBconnection.php';

  $db = new DBconnection(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <!-- Font awesome link -->
    <script src="https://kit.fontawesome.com/d68d9e7151.js" crossorigin="anonymous"></script>
    
    <!-- Jquery link -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <style>
  .header{
    display: flex;
    align-items: center;
    gap: 1rem;
  }
  .btn-con{
    display:flex;
    width: 75%;
    align-items: center;
    justify-content: end;
  }
  h5{
    margin: 0;
  }
  .manage{
    display: flex;
    gap: 10px;
  
  }
  .addBookForm{
    display: flex;
    flex-direction: column;
    gap: 20px;
  }


  </style>
</head>
<body>
<!-- NavigationBar -->
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand mx-3" href="#"><i class= " mx-2 fa-solid fa-book-open"></i>Library Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="mx-3 nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="mx-3 nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="mx-3 nav-link" href="#">Books</a>
        </li>
        <li class="nav-item">
          <a class="mx-3 nav-link" href="#">Borrowed</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Dashboard -->
<div class="mt-3 container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="header card-header">
          <i class="fs-5 fa-solid fa-book"></i>
          <h5>List of Books</h5>
          <div class="btn-con">
          <button class="btn btn-success " data-bs-toggle="modal" data-bs-target="#addBook">Add Book</button>
          </div>

        </div>
        <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width= "15%">No.</th>
                  <th width= "55%">Book Title</th>
                  <th width= "30%">Manage book</th>
                </tr>
              </thead>

              <tbody>
                  <tr class="content">
                    <td>1</td>
                    <td>Hello</td>
                    <td class="manage">
                      <button class="btn btn-primary btn-small"><i class="fa-regular fa-pen-to-square"></i>Edit Book</button>
                      <button class="btn btn-danger btn-small"><i class="fa-solid fa-trash"></i>Delete</button>
                    </td>
                  </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ADD NEW BOOK-->
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
            <input type="text" name="Book Title" class="form-control" required placeholder="Enter Title Here">
          </div>
          <div class="form-group">
            <label for="bookDesc">Book Description</label>
            <input type="text" name="Book Description" class="form-control" required placeholder="Enter Destription Here">
          </div>
          <div class= " form-group">
            <label for="author">Book Author</label>
            <input type="text" name="Book Author" class="form-control" required placeholder="Enter Author Here">
          </div>
          <div class= "form-group">
            <label for="ISBN">ISBN</label>
            <input type="number" name="ISBN" class="form-control" required placeholder="Enter ISBN Here">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add Book</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>