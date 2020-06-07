<?php 
require_once __DIR__ . '/../model/kladionicaservice.class.php';

class SportController
{
	public function index() 
	{
		$ks = new KladionicaService();
		$title = 'Sportska ponuda';
		$sportList=$ks->dohvatiSportove();
		$iznos=$ks->dohvatiIznos($_SESSION['user']);
		$utakmice_po_sportovima=array();
		for($i=0;$i<count($sportList);$i++)
		{
			array_push($utakmice_po_sportovima,$ks->dohvatiUtakmiceSporta($sportList[$i]));
		}
		require_once __DIR__ . '/../view/sport_index.php';
	}
}; 

?>
