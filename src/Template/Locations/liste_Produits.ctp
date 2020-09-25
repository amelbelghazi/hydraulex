<?php
$listeproduit = ''; 
$listeproduit .= '{"suggestions": [';
foreach ($produits as $produit) {
	if ($listeproduit == '{"suggestions": [')
 		$listeproduit .= '"'.$produit->nom.'"';
	else 
		$listeproduit .= ', "'.$produit->nom.'"';
 } 
$listeproduit .= ']}'; 

echo $listeproduit;
?>