<?php
//- afficher le nom de la categorie dont on a recu l'id dans l'url en titre de la page 
//- lister les produits appartenant à la catégorie avec leur photo s'ils en ont une
require_once __DIR__ .'/include/init.php';


//$query = 'SELECT * FROM categorie WHERE id = ' . $_GET['id'];
//$stmt = $pdo->query($query);
//$categorie = $stmt->fetch();
// autre méthode
$query = 'SELECT nom FROM categorie WHERE id = ' . $_GET['id'];
$stmt = $pdo->query($query);
$titre = $stmt->fetchColumn();

$query = 'SELECT * FROM produit WHERE categorie_id = ' . $_GET['id'];
$stmt = $pdo->query($query);
$produits = $stmt->fetchAll();


//include __DIR__ .'/menu-categorie.php';
include __DIR__ . '/layout/top.php';
?>

<h2><?= $titre; ?></h2> 

<div class="row">
	<?php
	foreach ($produits as $produit) :
		$src = (!empty($produit['photo']))
		? PHOTO_WEB . $produit['photo']
		:PHOTO_DEFAULT
		;
	?>
	<div class="col-sm-3">
		<div class="card">
			<img class="card-img-top" src="<?= $src; ?>">
			<div class="card-body">
				<h5 class="card-titletext-center"><?= $produit['nom']; ?></h5>
				<p class="card-text text-center" ><?= prixFr($produit['prix']); ?></p>
				<p class="card-text text-center">
					<a class="btn btn-primary" 	href="produit.php?id=<?=$produit['id']; ?>">Voir</a>
				</p>
				
			</div>
			
		</div>
	</div>
<?php
endforeach;
?>
</div>

<?php
include __DIR__ . '/layout/bottom.php';
?>