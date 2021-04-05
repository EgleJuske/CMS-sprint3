<?php
include_once "bootstrap.php";

use Model\Page;

// Getting app name
$appPathArray = explode('\\', getcwd());
$appName = strtolower(end($appPathArray));

$errorMsg = '';

// Logout
session_start();
if (isset($_GET['action']) and $_GET['action'] == 'logout') {
  session_start();
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  unset($_SESSION['logged_in']);
  header('Location: /' . $appName . '/admin');
  exit;
}

// Login
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  if ($_POST['username'] == 'Gurgutis' && $_POST['password'] == '1234') {
    $_SESSION['logged_in'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = 'Gurgutis';
  } else {
    print('<div style="color:red">Wrong username or password</div>');
  }
}

// Delete page
if (isset($_GET['delete'])) {
  $user = $entityManager->find('Model\Page', $_GET['delete']);
  $entityManager->remove($user);
  $entityManager->flush();
  header('Location: /' . $appName . '/admin');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Admin page</title>
</head>

<body>
  <?php
  if (!$_SESSION['logged_in']) {
    echo '<div class="login-form-placeholder">
          <form action="" method="post">
              <input type="text" name="username" placeholder="username = Gurgutis" required autofocus></br>
              <input type="password" name="password" placeholder="password = 1234" required><br>
              <button class="btn login-btn" type="submit" name="login">Login</button>
          </form>
        </div>';
  } else {
    include 'admin-nav.php';
  ?>
    <div class="table-placeholder">
      <?php
      $pages = $entityManager->getRepository('Model\Page')->findAll();
      echo '<table><thead>
          <tr>
            <th>Title</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>';
      foreach ($pages as $page) {
        $buttons = '';
        if ($page->getId() === 1) {
          $buttons = '<a class="btn edit-btn" href="?edit=' . $page->getId() . '">Edit</a>';
        } else {
          $buttons = '<a class="btn edit-btn" href="?edit=' . $page->getId() . '">Edit</a>
          <a class="btn delete-btn" href="?delete=' . $page->getId() . '">Delete</a>';
        }
        echo '<tr>
          <td>' . $page->getPageName() . '</td>
          <td>
              ' . $buttons . '
          </td>
        </tr>';
      }
      echo '</tbody></table>';
      ?>
    </div>

    <a class="btn add-btn" href="?add">Add Page</a>
    </main>

    <footer>
      <div>Fun facts about php <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstleyVEVO" target="_blank">HERE</a></div>
    </footer>
  <?php } ?>
</body>

</html>