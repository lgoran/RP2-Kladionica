<?php 
require_once __DIR__ . '/../model/kladionicaservice.class.php';

class SportController
{
	public function index() 
	{
		$ks = new KladionicaService();
		$title = 'Sportska ponuda';
		
		$utakmiceList=$ks->dohvatiUtakmice();
		
		require_once __DIR__ . '/../view/sport_index.php';
	}
}; 

?>
