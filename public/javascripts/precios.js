/**
 * Created by LUIGGI on 25-05-2015.
 */
function calcular(km) {

    var resultados;

        resultados=km.value*25;
    //document.getElementById("calculo_precio").innerHTML.print(resultados);
  //  alert(resultados);
    document.getElementById("invoice_monto").value = parseInt(resultados);
}

$(document).ready(function(){
    $(document).mousemove(function(e){
        TweenLite.to($('body'),
            .5,
            { css:
            {
                backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
            }
            });
    });
});


function tipo(tipo) {

    //var crane = tipo.;
    console.log(tipo);
    //document.getElementById("calculo_precio").innerHTML.print(resultados);
    //  alert(resultados);
    $('plataforma')
    if (crane == "PLATAFORMA") {
        document.getElementById("plataforma").attr('disabled',false);
        document.getElementById("grua").attr('disabled',true);
    }
    else {
        document.getElementById("grua").attr('disabled',false);
        document.getElementById("plataforma").attr('disabled',true);
    }

}


