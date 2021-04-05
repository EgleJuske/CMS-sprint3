<?php
include_once "bootstrap.php";

use Model\Page;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Happy to see you here</title>
</head>

<body>
  <header>
    <h2>This is a simple CMS page</h2>
    <div class="top-nav-placeholder">
      <?php
      $pages = $entityManager->getRepository('Model\Page')->findAll();
      foreach ($pages as $page) {
        echo '<a href="?id=' . $page->getId() . '">' . $page->getPageName() . '</a>';
      }
      ?>
    </div>
  </header>

  <main>
    <?php
    if (!$_GET['id']) {
      $page = $entityManager->find('Model\Page',  1);
      echo '<h3>' . $page->getPageName() . '</h3>';
      echo '<div>' . $page->getPageContent() . '</div>';
    } else {
      $page = $entityManager->find('Model\Page',  $_GET['id']);
      echo '<h3>' . $page->getPageName() . '</h3>';
      echo '<div>' . $page->getPageContent() . '</div>';
    }
    ?>
  </main>

  <footer>
    <div>Fun facts about php <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstleyVEVO" target="_blank">HERE</a></div>
  </footer>
</body>

</html>