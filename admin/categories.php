<?php
require_once __DIR__ .'/../include/init.php';
adminSecurity();

// Lister les catégories dans un tableau HTML

// le requêtage ici
	$query = 'SELECT * FROM categorie';
	$stmt = $pdo->query($query);

	$categories = $stmt->fetchAll();


include __DIR__ . '/../layout/top.php';
?>

<h1>Gestion catégories</h1>

<p> 
	<a class="btn btn-info" href="categorie-edit.php">Ajouter une catégorie</a>
</p>

<!-- le tableau HTML ici -->
<table class="table">
	<tr>
		<th>Id</th>
		<th>Nom</th>
		<th width="250px"></th>
	</tr>
	<?php

	foreach ($categories as $categorie) :
	?>
		<tr>
			<td><?= $categorie['id']; ?></td>
			<td><?= $categorie['nom']; ?></td>
			<td>
				<a class="btn btn-info" href="categorie-edit.php?id=<?= $categorie['id']; ?>">
				Modifier</a>
				<a class="btn btn-danger" href="categorie-delete.php?id=<?= $categorie['id']; ?>">
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