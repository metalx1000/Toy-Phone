<!DOCTYPE html>
<html lang="en">
<head>
  <title>Toy Phone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    .main{
      height:100vh;
    }
    .item{
      height:15vh;
    }
    #display{
      font-size:500%;
    }
  </style>
  <script>
    $(document).ready(function(){
      $(".num").click(function(){
        var num = $(this).html();
        $("#display").append(num);
      });
    });
  </script>
</head>
<body>

<div class="container main">
  <h1 id="display" class="item"></h1>
  <div class="btn-group btn-group-justified item">
    <a href="#" class="num btn btn-primary">1</a>
    <a href="#" class="num btn btn-primary">2</a>
    <a href="#" class="num btn btn-primary">3</a>
  </div>
  <div class="btn-group btn-group-justified item">
    <a href="#" class="num btn btn-primary">4</a>
    <a href="#" class="num btn btn-primary">5</a>
    <a href="#" class="num btn btn-primary">6</a>
  </div>
  <div class="btn-group btn-group-justified item">
    <a href="#" class="num btn btn-primary">7</a>
    <a href="#" class="num btn btn-primary">8</a>
    <a href="#" class="num btn btn-primary">9</a>
  </div>
  <div class="btn-group btn-group-justified item">
    <a href="#" class="num btn btn-primary">*</a>
    <a href="#" class="num btn btn-primary">0</a>
    <a href="#" class="num btn btn-primary">#</a>
  </div>
  <button type="button" class="call btn btn-primary btn-block item">Call</button>
</div>
