<?php

class Tiket
{
    protected $id, $user_id,  $uplaceni_iznos, $moguci_dobitak, $vrijeme_uplate, $koeficijent;
    protected $utakmice,$odabiri_ishoda;

	function __construct( $id, $username, $password, $email)
	{
		$this->id = $id;
		$this->user_id = $user_id;
		$this->uplaceni_iznos = $uplaceni_iznos;
        $this->moguci_dobitak = $moguci_dobitak;
        $this->vrijeme_uplate = $vrijeme_uplate;
        $this->koeficijent = $koeficijent;
        $this->utakmice = $utakmice;
        $this->odabiri_ishoda = $odabiri_ishoda;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>
