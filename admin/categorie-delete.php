<?php
require_once __DIR__ . '/../include/init.php';
adminSecurity();

$query = 'DELETE FROM categorie WHERE id = ' . $_GET['id'];
$pdo->exec($query);

setFlashMessage('la catégorie est supprimée');

header('location: categories.php');
die;