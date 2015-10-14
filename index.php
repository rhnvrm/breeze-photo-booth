<?php

  require( __DIR__.'/facebook_start.php' );
 
  $helper = $fb->getRedirectLoginHelper();
 
  $permissions = ['email', 'user_posts','publish_actions']; // optional
  $callback    = 'http://localhost:8000/login.php';
  $loginUrl    = $helper->getLoginUrl($callback, $permissions);

 

  ?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Show your support for Net Neutralty </title>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <img src="images/redfort_night.jpg" class="bg">
    <div class="container">
      <div class="row">
        
        <div class="header">
          <h1>Show your support!</h1>
          <img src="http://www.snu-breeze.com/breeze/images/delhi.gif" style="height:50px;"/>
          <img class="profile" src="images/425080581014054.jpg"/>
        </div>
        <div class="content">
        <br/>
        <p>Show your support for Breeze by posting on Facebook. </p>       
          <a class="button button-primary" href=<?php echo htmlspecialchars($loginUrl);?> > Log in to Facebook </a> 
       
       </div>
        <ul class="share-buttons">
          <li><a href="#" title="Share on Facebook" target="_blank"><img src="images/simple_icons_black/Facebook.png"></a></li>
          <li><a href="#" target="_blank" title="Tweet"><img src="images/simple_icons_black/Twitter.png"></a></li>
          <li><a href="#" target="_blank" title="Submit to Reddit"><img src="images/simple_icons_black/Reddit.png"></a></li>
          <li><a href="#" target="_blank" title="Email"><img src="images/simple_icons_black/Email.png"></a></li>
        </ul>
        <footer class="footer">
        <a href='https://github.com/rhnvrm/breeze-photo-booth'>github</a>
        </footer>

      </div>
    </div>
    
  </body>
</html>
