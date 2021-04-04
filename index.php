<?php
include_once "bootstrap.php";
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
    <h1>This is a simple CMS page</h1>
    <div class="top-nav-placeholder">
      <?php
      $pages = $entityManager->getRepository('Root\Page')->findAll();
      foreach ($pages as $page) {
        echo '<a href="#">' . $page->getPageName() . '</a>';
      }
      ?>
    </div>
  </header>

  <main>
    <?php
    echo '<h2>' . $page->getPageName() . 'Page name</h2>';
    echo '<h3>' . $page->getPageHeader() . '</h3>';
    echo '<div>' . $page->getPageContent() . '</div>';
    ?>
  </main>

  <footer>
    <div>Footer for my page</div>
  </footer>
</body>

</html>