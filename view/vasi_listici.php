<?php require_once __DIR__ . '/_header.php'; ?>


<?php
foreach($ListaTiketa as $tiket){
    echo '<hr> <br>';
    echo '<div class="vas_tiket">' . 
            '<h3> Kladionica </h3>' .
            '<div class="headerListica">'.
                'Broj listića: ' . $tiket->id . '<br>' . "\n" .
                'Vrijeme uplate: ' . $tiket->vrijeme_uplate . '<br>' . "\n" .
            '</div>'.
            '<table class="utakmice_listic"' .
                '<tr><th>Br.</th><th>Sport</th><th>Domaci-Gosti</th><th></th><th>Koef.</th><th></th><th>Rez.</th>';
            $counter = 0;
            foreach($tiket->utakmice as $utakmica){
                $ime_kvote = 'kvota' . ($tiket->odabiri_ishoda)[$counter];
                echo '<tr>' .
                     '<td>' . $utakmica->id . '</td>' .
                     '<td>' . $utakmica->sport . '</td>' .
                     '<td>' . $utakmica->domaci . '-' . $utakmica->gosti . '</td>' .
                     '<td>' . ($tiket->odabiri_ishoda)[$counter] . '</td>' .
                     '<td>' . $utakmica->$ime_kvote . '</td>' .
                     '<td>';
                     //prvo provjera je li utakmica uopce odigrana, oznaka '-1' ako nije
                     if(($tiket->konacni_ishodi)[$counter] === '-1')
                     {
                        echo '<img class="oznaka_na_listicu" src="slike/neodigrano.png" alt="?" >';
                     }
                     //tu provjeravamo je li odigrana utakmica pogodena ili ne
                     else if( strlen(($tiket->odabiri_ishoda)[$counter]) === 1 )
                     {
                        if( ($tiket->odabiri_ishoda)[$counter] === ($tiket->konacni_ishodi)[$counter] ){
                            //pogodak
                            echo '<img class="oznaka_na_listicu" src="slike/pogodeno.png" alt="+" >';
                        }
                        else{
                            //promasaj
                            echo '<img class="oznaka_na_listicu" src="slike/promasaj.png" alt="-" >';
                        }
                     }
                     else
                     {
                        //ostaju samo 1X i 2X kao mogucnosti
                        if(($tiket->konacni_ishodi)[$counter] === 'X'){
                            //pogodak u oba slucaja
                            echo '<img class="oznaka_na_listicu" src="slike/pogodeno.png" alt="+" >';
                        }
                        else{
                            //krajnji rezultat je 1 ili 2
                            if( substr(($tiket->odabiri_ishoda)[$counter], 0, 1) === ($tiket->konacni_ishodi)[$counter] ){
                                //pogodak
                                echo '<img class="oznaka_na_listicu" src="slike/pogodeno.png" alt="+" >';
                            }
                            else{
                                //promasaj
                                echo '<img class="oznaka_na_listicu" src="slike/promasaj.png" alt="-" >';
                            }
                        }
                     }
                     echo '</td>' .
                     '<td>' . ($tiket->konacni_ishodi)[$counter] . '</td>' .
                     
                     '</tr>';
                $counter++;
            }
    echo    '</table>' .
            '<div class="footerListica">'.
                'Uplaćeni iznos: ' . $tiket->uplaceni_iznos . ' kn <br>' . "\n" . 
                'Koeficijent: ' . $tiket->koeficijent . '<br>' . "\n" . 
                'Mogući dobitak : ' . $tiket->moguci_dobitak . ' kn <br>' . "\n" . 
            '</div>'.
         '</div>';
}

if( count($ListaTiketa) === 0 ){
    echo '<p>Nema uplaćenih listića!</p><br>';
}
?>





<?php require_once __DIR__ . '/_footer.php'; ?>