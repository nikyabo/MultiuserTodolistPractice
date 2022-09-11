<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
</head>
<body>
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Your name: {{ Auth::user()->name }}</h5>
    <p class="card-text">Your Email: {{ Auth::user()->email }}</p>
    <a href="#" class="btn btn-primary">Edit</a>
  </div>
</div>
</body>
</html>