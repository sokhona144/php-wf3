<?php
require_once __DIR__ . '/../include/init.php';
adminSecurity();


$query = 'SELECT  photo FROM produit WHERE id = ' . $_GET['id'];
$stmt = $pdo->query($query);
$photo = $stmt->fetchClumn();

// on supprime l'image du produit dans le répertoire photo s'il en a une

if (!empty($photo)) {
	unlink(PHOTO_DIR . $photoActuelle);
}

$query = 'DELETE FROM produit WHERE id = ' . $_GET['id'];
$pdo->exec($query);

setFlashMessage('le produit est supprimée');

header('location: produits.php');
die;