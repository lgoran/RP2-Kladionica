$( document ).ready( function()
{   
    draw_canvas();
    $( "#h" ).html("Stanje na računu: " + novac + " kredita.");
    $( "#btn" ).on( "click", igraj );
    $( "#pravila" ).on( "click", vidi_pravila );
    $( "#nova" ).on( "click", nova_igra);
    $( "#canvas" ).on( "click", oznaci );
} );


var igra_se = 0;
// Novac se mora prominit
var novac = 100;
var colors = ["#0066ff", "red", "#00FF7F", "yellow", "magenta", "#FF8C00", "cyan","grey","white"]
var pressed = new Set();
var broj_pogodenih;

function vidi_pravila(){
    alert("Grčki loto sastoji se od izvlačenja 20 brojeva iz skupa od 80 brojeva. Igrač može izabrati između \
jednog i dvanaest brojeva na koje se želi kladiti. Igrač mora pogoditi sve označene brojeve da bi osvojio \
dobitak. Što je više brojeva odabrano to će dobitak biti veći. Ulog se unosi u brojevni okvir te igra započinje pritiskom na gumb Igraj. Gumb \
Nova igra briše odabrane brojeve.");
}

function oznaci() {
    if (igra_se) return;
    var ctx = this.getContext( "2d" );
    var rect = this.getBoundingClientRect();
    var x = event.clientX - rect.left, y = event.clientY - rect.top;
    var size = rect.width / 40,i,j;
    if (y > 2*size) return;
    for (i = 0; i < 2; i++){
        for (j = 0; j < 40; j++)
            if (y < ((i+1)*size + 2) && x < (j+1)*size){
                var row = i;
                var col = j;
                var flag = 1;
                break;
            }
        if (flag) break;
    }
    var num = (i == 0) ? (j+1) : (j+1 + 40);
    if (pressed.has(num)){
        pressed.delete(num);
        draw_canvas();
    }
    else {
        if (pressed.size == 12) return;
        pressed.add(num);
        draw_canvas();
    }
}

function draw_canvas(){
    var ctx = $("#canvas").get(0).getContext("2d");
    var rect = $("#canvas").get(0).getBoundingClientRect();
    ctx.lineWidth = "3";
    ctx.textAlign = "center";
    var size = rect.width / 40;
    var num = 1;
    for (var i = 0; i < 2; i++)
        for (var j = 0; j < 40; j++){
            if (pressed.has(num)) ctx.fillStyle = "#ff6666";
            else ctx.fillStyle = "azure";

            ctx.strokeRect(j*size,i*size + 2, size, size);
            ctx.fillRect(j*size,i*size + 2, size, size);
            ctx.fillStyle = "black";
            ctx.font = "15px Arial";
            ctx.fillText(num, j*size + size/2, i*size + 2*size/3 + 2);
            num++;
        }
}
function nova_igra(){
    if (igra_se) return;
    pressed.clear();
    draw_canvas();
    $( "#p" ).html("");
}

function igraj(){

    if (igra_se) return;
    var n = $("#num").val();
    if (!n){
        $( "#p" ).html("<b>Molimo unesite neki iznos.</b>");
        return;
    }
    if (pressed.size < 1){
        $( "#p" ).html("<b>Morate izabrat barem jedan broj!</b>");
        return;
    }
    if (n > novac) {
        $( "#p" ).html("<b>Nemate toliko kredita.</b>");
        return;
    }
    else novac -= n;

    var c = document.getElementById("canvas");
    var ctx = c.getContext("2d");
    var rect = c.getBoundingClientRect();
    ctx.clearRect(0, 3*rect.width/40, canvas.width, canvas.height);

    $( "#h" ).html("Stanje na računu: " + novac + " kredita.");
    $( "#p" ).html("");
    var tocka = {
        x: rect.left + 50, 
        y: rect.top - 200
    };
    var r = 40, arr = new Set();
    igra_se = 1;
    broj_pogodenih = 0;
    //var x = rect.left + 50, y = rect.top, r = 40;
    ctx.font = "30px Arial";
    ctx.textAlign = "center";
    var id = setInterval(crtaj, 100);
    
    function crtaj(){
        while(1){
            var broj = Math.floor(Math.random() * 80) + 1;
            if (arr.has(broj))
                continue;
            else{
                arr.add(broj);
                break;
            }
        }
        if (pressed.has(broj)) broj_pogodenih++;
        ctx.beginPath();
        ctx.arc(tocka.x, tocka.y, r, 0, 2 * Math.PI);
        ctx.fillStyle = colors[Math.floor((broj - 1)/10)];
        ctx.fill();
        ctx.lineWidth = 3;
        ctx.strokeStyle = "black";
        ctx.stroke();
        ctx.strokeText(broj.toString(), tocka.x, tocka.y+10);
        if (arr.size == 10){
            tocka.x = rect.left + 50;
            tocka.y += 100;
            return;
        }
        else if (arr.size == 20){
            clearInterval(id);
            $("#p").html('<p>Pogodili ste ' + broj_pogodenih + ' od ' + pressed.size + ' brojeva.</p>');
            igra_se = 0;
            if (broj_pogodenih == pressed.size){
                alert("Čestitamo!\nOsvojili ste " + dobitak(broj_pogodenih, n) + " kredita.");
                novac += dobitak(broj_pogodenih, n);
                $( "#h" ).html("Stanje na računu: " + novac + " kredita.");
            }
            return;
        }
        tocka.x+=100;
    }
    
}
function dobitak(broj, ulog){
    var rez = ulog * 4.2;
    for (var i = 1; i < broj; i++) rez *= 4;
    return rez;
}
