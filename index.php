<?php
require_once "./bootstrap.php";

$request = $_SERVER['REQUEST_URI'];
$prefix = '/cms-sprint3';

switch ($request) {
  case $prefix . '/':
    require __DIR__ . '/src/views/home.php';
    break;
  case $prefix . '':
    require __DIR__ . '/src/views/home.php';
    break;
  case $prefix . '/home':
    require __DIR__ . '/src/views/home.php';
    break;
  case $prefix . '/home?pageId=' . $_GET['pageId']:
    require __DIR__ . '/src/views/home.php';
    break;
  case $prefix . '/admin?action=logout':
    require __DIR__ . '/src/views/admin.php';
    break;
  case $prefix . '/admin':
    require __DIR__ . '/src/views/admin.php';
    break;
  case $prefix . '/admin?edit=' . $_GET['edit']:
    require __DIR__ . '/src/views/edit-page.php';
    break;
  case $prefix . '/admin?add':
    require __DIR__ . '/src/views/add-page.php';
    break;
  case $prefix . '/admin?delete=' . $_GET['delete']:
    require __DIR__ . '/src/views/admin.php';
    break;
  default:
    http_response_code(404);
    require __DIR__ . '/src/views/404.php';
    break;
}
