<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>signIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="">
</head>

<body>

    <!-- Start coding here -->
    <div class="col-md-8" style="margin:auto;">
           <h2>SignIn</h2>
            <form action="/login" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
       <div class="form-group">
           <label for="exampleInputEmail1">Email address</label>
           <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
           <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       <div class="form-group">
           <label for="exampleInputPassword1">Password</label>
           <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
       </div>
       <button type="submit" name="signin" class="btn btn-primary">Submit</button>
       <small id="emailHelp" class="form-text text-muted">Do not have an account <a href="/">register</a> </small>
    </div>

    <!-- Coding End -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>