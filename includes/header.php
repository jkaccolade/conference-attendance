<?php
include_once 'session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo 'Attendance - ' . $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="index.php">IT Conference</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            
            <?php
            //main navigation item
             $nav = array(
              array("title" => "Home", "url" => "index.php"),
              array("title" => "View Attendees", "url" => "viewrecords.php"),
            );
              //adding the 
              foreach ($nav as $items) {
                if ($items['title'] == $title){
                  echo '<li class="nav-item"><a class="nav-link active" href="'.$items['url'].'">'. $items['title'] .'</a></li>';
                }else{
                  echo '<li class="nav-item"><a class="nav-link" href="'.$items['url'].'">'. $items['title'] .'</a></li>';
                }
              }
            ?>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
    <br>
    <br>