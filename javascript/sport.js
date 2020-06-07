$( document ).ready(function() {
    var tiket=[];
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
        console.log(tiket);
        $("#odigrani_parovi").html("");
        for(var i=0;i<tiket.length;i++)
        {
            $("#odigrani_parovi").html($("#odigrani_parovi").html()+"<br>"+"Utakmica ID: "+tiket[i][0]+" Kvota:"+tiket[i][1]);
        }
        
    }
    );
});