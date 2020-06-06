<?php 
require_once __DIR__ . '/../model/kladionicaservice.class.php';

class SportController
{
	public function index() 
	{
		$cs = new KladionicaService();

		$title = 'Sportska ponuda';

		require_once __DIR__ . '/../view/sport_index.php';
	}
}; 

?>
