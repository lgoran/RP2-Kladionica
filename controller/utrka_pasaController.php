<?php 
require_once __DIR__ . '/../model/kladionicaservice.class.php';

class Utrka_pasaController
{
	public function index() 
	{
		$ks = new KladionicaService();
		$title = 'Utrka pasa';		
		require_once __DIR__ . '/../view/utrka_pasa.php';
	}
}; 

?>
