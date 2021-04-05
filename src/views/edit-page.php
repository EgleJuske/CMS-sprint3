<?php
include_once "bootstrap.php";

use Model\Page;

$appPathArray = explode('\\', getcwd());
$appName = strtolower(end($appPathArray));
$errorMsg = '';


// Cancel edit page
if (isset($_POST['cancel'])) {
  unset($_GET['edit']);
  header('Location: /' . $appName . '/admin');
}

// Edit page
if (isset($_POST['edit_page'])) {
  if (empty($_POST['edit_name'])) {
    $errorMsg = '<div style="color: red; margin-top: 20px;">Page name can not be empty!</div>';
  } else {
    $user = $entityManager->find('Model\Page', $_POST['edit_page']);
    $user->setPageName($_POST['edit_name']);
    $user->setPageContent($_POST['edit_content']);
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
  <title>Edit page</title>
</head>

<?php
include 'admin-nav.php';
$page = $entityManager->find('Model\Page', $_GET['edit']);

echo '<h2>Edit page: ' . $page->getPageName() . '</h2>
            <div class="edit-page-form-placeholder">
              <form class="edit-page" action="" method="POST">
                <label for="edit-name">Page name:</label><br>
                <input type="text" id="edit-name" name="edit_name" placeholder="edit name" value="' . $page->getPageName() . '"><br>
                <label for="edit-content">Page content:</label><br>
                <textarea cols="80" rows="15" id="edit-content" name="edit_content" placeholder="Edit page content">' . $page->getPageContent() . '</textarea><br>
                <button type="submit" class="btn edit-btn" name="edit_page" value="' . $page->getId() . '">Submit edit</button>
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