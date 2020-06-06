<?php require_once __DIR__ . '/_header.php'; ?>

<table class="tablica_utakmica">
	
	<?php 
		if(count($utakmiceList)!=0)
		{
            //$id, $domaci, $gosti, $kvota1, $kvotaX, $kvota2, $kvota1X, $kvota2X

			echo '<tr><th>Domaći</th><th>Gosti</th><th>1</th><th>X</th><th>2</th><th>1X</th><th>2X</th></tr>';
		}
		else 
		{
			echo 'Nema utakmica';
		}
		foreach( $utakmiceList as $utakmica )
		{
			echo '<tr>' .
				 '<td>'. $utakmica->domaci . '</td>' . '<td>'. $utakmica->gosti . '</td>' . 
				 '<td><button>'. $utakmica->kvota1 . '</button></td>' . '<td><button>'. $utakmica->kvotaX . '</button></td>' . 
				 '<td><button>'. $utakmica->kvota2 . '</button></td>' . '<td><button>'. $utakmica->kvota1X . '</button></td>' .
				 '<td><button>'. $utakmica->kvota2X . '</button></td>' .  
			     '</tr>';
		}
	?>
</table>
<?php require_once __DIR__ . '/_footer.php'; ?>
