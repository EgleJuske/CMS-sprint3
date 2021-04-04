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
  <title>Admin page</title>
</head>

<body>
  <header>
    <h1>This is a simple CMS page</h1>
    <div class="top-nav-placeholder">
      <a href="#">Admin</a>
      <a href="#">View website</a>
      <a href="#">Logout</a>
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
            <form>
              <button type="submit" class="btn edit-btn">Edit</button>
              <button type="submit" class="btn delete-btn">Delete</button>
            </form>
          </td>
        </tr>';
      }
      echo '</tbody></table>';
      ?>
    </div>
    <div class="btn-placeholder">
      <form>
        <button type="submit" class="btn add-btn">Add page</button>
      </form>
    </div>
  </main>

  <footer>
    <div>Footer for my page</div>
  </footer>
</body>

</html>