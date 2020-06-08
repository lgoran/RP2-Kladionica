<?php require_once __DIR__ . '/_header.php'; ?>

    <canvas width="20" height="700" id="canvas" style="border:black solid 3px;float: right;"></canvas>
    <h1><?php $title ?></h1>
    <hr>
    Pas 1: <b>Jack</b>
    <hr>
    <p id="p1" style="text-indent: 0px;"><span><img src="slike/dog1.jpeg" alt="dog1" width="50px"></span></p><hr>
    
    Pas 2:<b>John</b>
    <hr><p id="p2" style="text-indent: 0px;"><span><img src="slike/dog2.jpeg" alt="dog2" width="50px"></span></p><hr>
    
    Pas 3:<b>Mack</b>
    <hr><p id="p3" style="text-indent: 0px;"><span><img src="slike/dog3.webp" alt="dog3" width="50px"></span></p><hr>
    
    Pas 4:<b>Phil</b>
    <hr><p id="p4" style="text-indent: 0px;"><span><img src="slike/dog4.webp" alt="dog4" width="50px"></span></p><hr>
    
    Pas 5:<b>Guns</b>
    <hr><p id="p5" style="text-indent: 0px;"><span><img src="slike/dog5.webp" alt="dog5" width="50px"></span></p><hr>
    <div id="oklada">        
        Odaberi psa:<br>
        <label for="pas1">Jack</label><input type="radio" name="odabir" id="pas1" checked>
        <label for="pas2">John</label><input type="radio" name="odabir" id="pas2">
        <label for="pas3">Mack</label><input type="radio" name="odabir" id="pas3">
        <label for="pas4">Phil</label><input type="radio" name="odabir" id="pas4">
        <label for="pas5">Guns</label><input type="radio" name="odabir" id="pas5">
        <br>
        <input type="number" id="ulog" min="1" max="10" value="1"><button id="ulozi">Igraj</button>
        <p>Stanje računa: <span id="stanje_racuna"><?php echo $iznos;?></span></p>
        <p id="pobjednik" style="font-weight: bold;"></p>
    </div>
    <script type="text/javascript" src="javascript/utrka_pasa.js"></script>

<?php require_once __DIR__ . '/_footer.php'; ?>    
