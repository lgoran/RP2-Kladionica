<?php 
require_once __DIR__ . '/../model/kladionicaservice.class.php';

class Grcki_lotoController
{
	public function index() 
	{
        $ks = new KladionicaService();
        $stanje = $ks -> getUserByUsername($_SESSION['user'])->iznos;
		$title = 'Grčki loto';		
		require_once __DIR__ . '/../view/grcki_loto.php';
	}
}; 

?>