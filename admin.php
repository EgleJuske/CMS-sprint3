<?php
include_once "bootstrap.php";

use Root\Page;

// Logout logic
session_start();
if (isset($_GET['action']) and $_GET['action'] == 'logout') {
  session_start();
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  unset($_SESSION['logged_in']);
  header('Location: ' . $_SERVER['PHP_SELF'] . '');
  exit;
}

// Login logic
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  if ($_POST['username'] == 'Gurgutis' && $_POST['password'] == '1234') {
    $_SESSION['logged_in'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = 'Gurgutis';
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'] . '');
  } else {
    print('<div style="color:red">Wrong username or password</div>');
  }
}

// Delete page
if (isset($_POST['delete'])) {
  $user = $entityManager->find('Root\Page', $_POST['delete']);
  $entityManager->remove($user);
  $entityManager->flush();
}

// Add page
if (isset($_POST['add'])) {

  echo $_POST['page_name'];

  $page = new Page();
  $page->setPageName($_POST['page_name']);
  $page->setPageHeader($_POST['page_header']);
  $page->setPageContent($_POST['page_content']);
  $entityManager->persist($page);
  $entityManager->flush();
  header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'] . '');
}

// Cancel edit page
if (isset($_POST['cancel'])) {
  unset($_POST['edit']);
}

// Edit page
if (isset($_POST['edit_page'])) {
  $user = $entityManager->find('Root\Page', $_POST['page_id']);
  $user->setPageName($_POST['edit_name']);
  $user->setPageHeader($_POST['edit_header']);
  $user->setPageContent($_POST['edit_content']);
  $entityManager->flush();
  header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'] . '');
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
              <input type="password" name="password" placeholder="password = 1234" required>
              <button class="btn" type="submit" name="login">Login</button>
          </form>
        </div>';
  } else {
  ?>
    <header>
      <h1>This is a simple CMS page</h1>
      <div class="top-nav-placeholder">
        <a href="#">Admin</a>
        <a href="#">View website</a>
        <a href="?action=logout">Logout</a>
      </div>
    </header>

    <main>
      <h2>Page name</h2>
      <div class="table-placeholder">
        <?php
        $pages = $entityManager->getRepository('Root\Page')->findAll();
        echo '<table><thead>
          <tr>
            <th>Title</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($pages as $page) {
          echo '<tr>
          <td>' . $page->getPageName() . '</td>
          <td>
            <form method="POST">
              <button type="submit" class="btn edit-btn" name="edit" value="' . $page->getId() . '">Edit</button>
              <button type="submit" class="btn delete-btn" name="delete" value="' . $page->getId() . '">Delete</button>
            </form>
          </td>
        </tr>';
        }
        echo '</tbody></table>';
        ?>
      </div>
      <div class="btn-placeholder">
        <form action="" method="POST">
          <input type="text" name="page_name" placeholder="page name"><br>
          <input type="text" name="page_header" placeholder="page header"><br>
          <input type="text" name="page_content" placeholder="page content"><br>
          <button type="submit" class="btn add-btn" name="add">Add page</button>
        </form>
      </div>

      <br>
      <div>
        <?php
        if (isset($_POST['edit'])) {
          $page = $entityManager->find('Root\Page', $_POST['edit']);
          echo '<form class="edit-page" action="" method="POST">
        <input type="number" name="page_id" value="' . $page->getId() . '"><br>
        <input type="text" name="edit_name" placeholder="edit name" value="' . $page->getPageName() . '"><br>
        <input type="text" name="edit_header" placeholder="edit header" value="' . $page->getPageHeader() . '"><br>
        <input type="text" name="edit_content" placeholder="edit content" value="' . $page->getPageContent() . '"><br>
        <button type="submit" class="btn edit-btn" name="edit_page">Submit edit</button>
        <button type="submit" class="btn cancel-btn" name="cancel">Cancel</button>
      </form>';
        }
        ?>
      </div>
    </main>

    <footer>
      <div>Footer for my page</div>
    </footer>
  <?php } ?>
</body>

</html>