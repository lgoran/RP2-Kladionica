var tiket=[];
$( document ).ready(function() { 
    $("#uplaceni_iznos").on("input",function()
    {
        var str=$("#uplaceni_iznos").val();
        if(isNaN(str))
        {
            $("#uplaceni_iznos").val(str.substring(0,str.length-1));
            alert("Iznos mora biti broj");
            return;
        }
        else
        {
            if(parseFloat(str)<1)
            {
                str="1";
                $("#uplaceni_iznos").val(1);
            }
            
            $("#potencijalni_dobitak").html((parseFloat(str)*parseFloat($("#ukupna_kvota").html())).toFixed(3));
        }
    })
    $("button").on("click",function()
    {
        var botun_id=$(this).attr("id");
        var botun_html=$(this).html();
        var utakmica_id=0;
        for(var i=0;i<botun_id.length;i++)
        {
            if(botun_id[i]==="b")
                break;
            utakmica_id*=10;
            utakmica_id+=parseInt(botun_id[i]);
        }
        var par_array=[utakmica_id,botun_html];
        if(tiket.length===0)
        {
            tiket.push(par_array);
        }
        else if(tiket.length>0)
            for(var i=0;i<tiket.length;i++)
            {
                if(tiket[i][0]===utakmica_id)
                {
                    if(tiket[i][1]===botun_html)
                    {
                        return;
                    }
                    else
                    {
                        tiket[i][1]=botun_html;
                    }
                    break;
                }
                if(i===tiket.length-1)
                {
                    tiket.push(par_array);
                    break;
                }
            }
            crtaj_listic();
    }
    );
    
    
    
});
function crtaj_listic()
    {
        $("#odigrani_parovi").html("");
        var kvota=1.0;
        for(var i=0;i<tiket.length;i++)
        {
            kvota*=parseFloat(tiket[i][1]);
            $("#odigrani_parovi").html($("#odigrani_parovi").html()+
                    "<br>"+"Utakmica ID: "+tiket[i][0]+" Kvota:"+tiket[i][1]+
                    '<button onclick="brisi_par('+tiket[i][0]+')" style="color:red;">X</button>');
        }
        $("#ukupna_kvota").html(kvota.toFixed(3));
        $("#potencijalni_dobitak").html((parseFloat($("#uplaceni_iznos").val())*parseFloat($("#ukupna_kvota").html())).toFixed(3));

    }
function brisi_par(id){
    var utakmica_id=parseInt(id);
    for(var i=0;i<tiket.length;i++)
    {
        if(tiket[i][0]===utakmica_id)
        {
            tiket.splice(i,1);
            break;
        }
    }
    crtaj_listic();
}