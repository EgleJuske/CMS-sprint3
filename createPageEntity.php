<?php
include './vendor/autoload.php';

use Root\Page;

$newPageName = $argv[1];
$newPageHeader = $argv[2];
$newPageContent = $argv[3];

$page = new Page();
$page->setPageName($newPageName);
$page->setPageHeader($newPageHeader);
$page->setPageContent($newPageContent);
$entityManager->persist($page);
$entityManager->flush();

echo "Created Page with ID " . $page->getId() . "\n";
