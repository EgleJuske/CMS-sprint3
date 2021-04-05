<?php
include_once "bootstrap.php";

use Model\Page;

$appPathArray = explode('\\', getcwd());
$appName = strtolower(end($appPathArray));
$errorMsg = '';

// Cancel edit page
if (isset($_POST['cancel'])) {
  unset($_GET['add']);
  header('Location: /' . $appName . '/admin');
}

// Add page
if (isset($_POST['add_page'])) {
  if (empty($_POST['page_name'])) {
    $errorMsg = '<div style="color: red; margin-top: 20px;">Page name can not be empty!</div>';
  } else {
    $page = new Page();
    $page->setPageName($_POST['page_name']);
    $page->setPageContent($_POST['page_content']);
    $entityManager->persist($page);
    $entityManager->flush();
    header('Location: /' . $appName . '/admin');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Add page</title>
</head>

<?php
include 'admin-nav.php';
echo '<h2>Add new page</h2>
    <div class="add-page-form-placeholder">
        <form action="" method="POST">
        <label for="add-name">Page name:</label><br>
        <input type="text" id="add-name" name="page_name" placeholder="page name"><br>
        <label for="add-content">Page content:</label><br>
        <textarea cols="80" rows="15" id="add-content" name="page_content" placeholder="page content"></textarea><br>
        <button type="submit" class="btn add-btn" name="add_page">Add page</button>
        <button type="submit" class="btn cancel-btn" name="cancel">Cancel</button>
      </form>
    </div>';
echo $errorMsg;
?>
</main>

<footer>
  <div>Fun facts about php <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstleyVEVO" target="_blank">HERE</a></div>
</footer>
<?php
// } 
?>
</body>

</html>