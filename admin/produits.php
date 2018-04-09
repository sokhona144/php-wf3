<?php
// faire la page qui liste produits dans un tableau HTML
require_once __DIR__ .'/../include/init.php';
adminSecurity();

// Lister les produits dans un tableau HTML

// le requêtage ici
// p et c sont les alias de produit et categorie
// categorie_nom est l'alias du champ nom de la table categorie
//p.* veut dire tous les champs de la table produit
$query = <<<EOS
SELECT p.*, c.nom AS categorie_nom
FROM produit p
JOIN categorie c ON p.categorie_id = c.id
EOS;

$stmt = $pdo->query($query);

$produits = $stmt->fetchAll();


include __DIR__ . '/../layout/top.php';
?>

<h1>Gestion produits</h1>

<p> 
	<a class="btn btn-info" href="produit-edit.php">Ajouter un produit</a>
</p>

<!-- le tableau HTML ici -->
<table class="table">
	<tr>
		<th>Id</th>
		<th>Nom</th>
		<th>Reference</th>
		<th>Prix</th>
		<th>Catégorie</th>
		<th width="250px"></th>
	</tr>
	<?php

	foreach ($produits as $produit) :
	?>
		<tr>
			<td><?= $produit['id']; ?></td>
			<td><?= $produit['nom']; ?></td>
			<td><?= $produit['reference']; ?></td>
			<td><?= prixFr( $produit['prix']); ?></td>
			<td><?= $produit['categorie_nom']; ?></td>
			<td>
				<a class="btn btn-info" href="produit-edit.php?id=<?= $produit['id']; ?>">
				Modifier</a>
				<a class="btn btn-danger" href="produit-delete.php?id=<?= $produit['id']; ?>">
					Supprimer
				</a>
			</td>
		</tr>
	<?php
	endforeach;
	?>
</table>
<?php
include __DIR__ . '/../layout/bottom.php';
?>