$( document ).ready(function() {
    var ulog;
        crtaj();
        $("#canvas").css("position","absolute");
        $("#canvas").css("left","1000px");
        
        function crtaj() 
        {
            var ctx = $( "#canvas" ).get(0).getContext( "2d" );   
            var promijeni=0;
            for( var x = 0; x < 2; ++x )
                for( var y = 0; y < 99; ++y )
                {
                    if(promijeni==0)
                    {
                        ctx.fillStyle = "black";
                        promijeni=1;
                    }
                    else
                    {
                        ctx.fillStyle = "white";
                        promijeni=0;
                    }
                    
                    ctx.fillRect( x*10, y*10, 10, 10 );
                }
        }
        $("#ulozi").on("click",function()
        {
            $("#oklada").hide();
            for(var i =1;i<=5;i++)
            { 
                $( "#p"+ i ).css("text-indent","0px");
            }
            ulog=parseInt($("#ulog").val());
            move_dogs();
        });
        function move_dogs() 
        {
            var flag=false;
            for(var i =1;i<=5;i++)
            { 
                var pomicanje=Math.floor(Math.random() * 3) + 1;
                var pikseli=parseInt($( "#p"+ i ).css("text-indent"));
                pikseli+=pomicanje;
                $( "#p"+ i ).css("text-indent",pikseli+"px");
                if(pikseli>1000-50-10)//50 velicina slike,20 velicina canvasa
                {
                    $("#pobjednik").html("Pobjednik pas "+i);
                    flag=true;
                    $("#oklada").show();
                    //reguliraj iznos na racunu
                    break;
                }
            }
            if(flag==false)
                setTimeout( move_dogs, 10 ); 
        }
});