<?php

  require( __DIR__.'/facebook_start.php' );
 
  $helper = $fb->getRedirectLoginHelper();
 
  $permissions = ['email', 'publish_actions', 'public_profile'];/*, 'user_about_me','user_actions.books',
  'user_actions.fitness','user_actions.music','user_actions.news','user_actions.video','user_birthday',
  'user_education_history','user_events','user_friends','user_games_activity',
  'user_hometown','user_likes','user_location','user_managed_groups',
  'user_photos','user_posts','user_relationship_details','user_relationships',
  'user_religion_politics','user_status','user_tagged_places','user_videos','user_website',
  'user_work_history']; */
  $callback    = 'login.php';
  $loginUrl    = $helper->getLoginUrl($callback, $permissions);

 

  ?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Show your support for Breeze</title>
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
        <?php include "share.php" ?>
        <?php include "footer.php" ?>

      </div>
    </div>
    
  </body>
</html>
