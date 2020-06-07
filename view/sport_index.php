<?php require_once __DIR__ . '/_header.php'; ?>
<div class="sport_tiket" id="sport_tiket">
	<p style="text-align:center;font-weight: bold;">Vaš tiket</p><hr>
	<p id="odigrani_parovi"></p>
	<input type="text" name="uplaceni_iznos" id="uplaceni_iznos" value="2">
	<button id="uplati">Odigraj tiket</button><br>
	Ukupna kvota:<span id="ukupna_kvota">1</span><br>
	Potencijalni dobitak:<span id="potencijalni_dobitak">2</span>


</div>
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
		for( $i=0;$i<count($utakmiceList);$i++ )
		{
			$utakmica=$utakmiceList[$i];
			echo '<tr>' .
				 '<td>'. $utakmica->domaci . '</td>' . '<td>'. $utakmica->gosti . '</td>' . 
				 '<td><button id="' . $utakmica->id .'b1">'. $utakmica->kvota1 . '</button></td>' . 
				 '<td><button id="' . $utakmica->id .'bX">'. $utakmica->kvotaX . '</button></td>' . 
				 '<td><button id="' . $utakmica->id .'b2">'. $utakmica->kvota2 . '</button></td>' . 
				 '<td><button id="' . $utakmica->id .'b1X">'. $utakmica->kvota1X . '</button></td>' .
				 '<td><button id="' . $utakmica->id .'b2X">'. $utakmica->kvota2X . '</button></td>' .  
			     '</tr>';
		}
	?>
</table>
<script type="text/javascript" src="javascript/sport.js"></script>
<?php require_once __DIR__ . '/_footer.php'; ?>
