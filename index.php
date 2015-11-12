<!DOCTYPE html >
<html lang="en" manifest="site.manifest">
<head>
  <title>Toy Phone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="lib/jquery.min.js"></script>
  <script src="lib/bootstrap.min.js"></script>
  <script src="lib/howler.min.js"></script>
<!--favicon-->
<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-touch-icon-144x144.png">
<link rel="icon" type="image/png" href="icons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="icons/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="icons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="icons/manifest.json">
<link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="icons/favicon.ico">
<meta name="apple-mobile-web-app-title" content="Toy Phone Dialer">
<meta name="application-name" content="Toy Phone Dialer">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="icons/mstile-144x144.png">
<meta name="msapplication-config" content="icons/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<!--end favicon-->

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
    //var people = [ "Dada.1.ogg", "Dada.2.ogg", "Mama.1.ogg", "Mama.2.ogg" ];
    var people = "<?php include('people.php');?>";
    people = people.split(";");
    var voices = [];
    var snd = document.createElement('audio');
    //var dial = loadAudio('sounds/dial1.ogg');
    var dial = new Howl({
      urls: ['sounds/dial1.ogg']
    });

    for(var i=0;i<people.length;i++){
      var p = new Howl({urls: [ 'people/' + people[i] ]});
      voices.push(p);
    }

    $(document).ready(function(){
      $(".num").click(function(){
        dial.play();
        var num = $(this).html();
        $("#display").append(num);

        //7 digites dial
        var displayLen = $("#display").html().length;
        if(displayLen == 8){
          call();
        }
      });

      $("#call").click(call);
    });

    function loadAudio(uri){
        var audio = new Audio();
        //audio.addEventListener('canplaythrough', isAppLoaded, false); // It works!!
        audio.src = uri;
        return audio;
    }
    
    function call(){
      snd.pause();
/*
      var person = people[Math.floor(Math.random()*people.length)];;
      snd.setAttribute('src', 'people/' + person);
      snd.setAttribute('autoplay', 'autoplay');
*/
      snd = voices[Math.floor(Math.random()*voices.length)];
      snd.play();      

      var name = snd._urls[0].split(".");
      name = name[0].split("/");
      name = name[1];
      $("#display").html("Calling " + name);
      setTimeout(function(){
        $("#display").html(name);
      },1000);

      setTimeout(function(){
        $("#display").html("");
      },5000);
    }
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
  <button type="button" id="call" class="call btn btn-primary btn-block item">Call</button>
</div>

</body>
</html>
