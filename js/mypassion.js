var marcha = 0; //control del temporizador
var cro = 0; //estado inicial del cronómetro.
visor = $("#reloj"); //localizar pantalla del reloj

//Botón Iniciar: Estado empezar: Poner en marcha el crono
function empezar(datos) {
    var tipoBoton = $(this).children(".nom-boton").html();
    if(tipoBoton == "Iniciar"){
        $(".btn").removeClass("disabled");
        $(this).children(".nom-boton").html("Terminar");
        emp = new Date(); //fecha inicial (en el momento de pulsar)
        elcrono = setInterval(tiempo,10); //función del temporizador.
        marcha = 1; //indicamos que se ha puesto en marcha.
    }
    else{
        $(".btn").addClass("disabled");
        reiniciar();
    }
}
//función del temporizador          
function tiempo() { 
    actual = new Date(); //fecha a cada instante
    //tiempo del crono (cro) = fecha instante (actual) - fecha inicial (emp)
    cro = actual - emp; //milisegundos transcurridos.
    cr = new Date(); //pasamos el num. de milisegundos a objeto fecha.
    cr.setTime(cro); 
    //obtener los distintos formatos de la fecha:
    cs = cr.getMilliseconds(); //milisegundos 
    cs = cs/10; //paso a centésimas de segundo.
    cs = Math.round(cs); //redondear las centésimas
    sg = cr.getSeconds(); //segundos 
    mn = cr.getMinutes(); //minutos 
    ho = cr.getHours() - 1; //horas 
    //poner siempre 2 cifras en los números      
    if (cs < 10) {cs = "0" + cs;} 
    if (sg < 10) {sg = "0" + sg;} 
    if (mn < 10) {mn = "0" + mn;}
    if (cs > 99) {cs = "00";} 
    //llevar resultado al visor.         
    visor.html(mn + ":" + sg + ":" + cs); 
}
//parar el cronómetro
function parar() { 
    clearInterval(elcrono); //parar el crono
    marcha=0; //indicar que está parado.
}        
//Continuar una cuenta empezada y parada.
function continuar() {
    emp2 = new Date(); //fecha actual
    emp2 = emp2.getTime(); //pasar a tiempo Unix
    emp3 = emp2-cro; //restar tiempo anterior
    emp = new Date(); //nueva fecha inicial para pasar al temporizador 
    emp.setTime(emp3); //datos para nueva fecha inicial.
    elcrono = setInterval(tiempo,10); //activar temporizador
    marcha = 1; //indicar que esta en marcha
}
//botón pausa / continuar
function pausa (datos){
    var boton = $(this).attr('id');
    var tiempo_partido = $("#reloj").html();
    if((boton === 'tiempo-local') || (boton === 'tiempo-visita')){
        $(this).children(".nom-boton").append("<br>" + tiempo_partido);
        $(this).addClass('disabled');
    }
    if((boton === 'tarjeta-local') || (boton === 'tarjeta-visita') || (boton === 'falta-local') || (boton === 'falta-visita') || (boton === 'gol-local') || (boton === 'gol-visita')){
        var botonTemp = boton.split('-');
        var botonShort = botonTemp[1];
        if(botonShort === 'local'){
            var equipo = $("#equipo-local").html();
        }
        else{
            var equipo = $("#equipo-visita").html();
        }
        $("#espere").removeClass("hidden");
        $("#espere").load("./tarjetas.php?boton="+boton+"&equipo="+encodeURI(equipo));
        marcha = 1;
    }

    var botonDetener = $("#detener-tiempo").children(".nom-boton").html();
    // Si la variable marcha es igual a 0 es por que el crono esta detenido 
    if (marcha == 0) { //con el boton en "continuar"
        $("#detener-tiempo").children(".nom-boton").html("Detener");
        continuar(); //ir a la función continuar
    }
    else {  //con el botón en "Detener"
        $("#detener-tiempo").children(".nom-boton").html("Continuar");
        parar(); //ir a la funcion parar
    }
}
//Volver al estado inicial cronometro a cero
function reiniciar() {
    if (marcha==1) {  //si el cronómetro está en marcha:
        clearInterval(elcrono); //parar el crono
        marcha=0;   //indicar que está parado
    }
    //en cualquier caso volvemos a los valores iniciales
    cro=0; //tiempo transcurrido a cero
    visor.html ("00:00:00"); //visor a cero
    $("#terminar-partido").children(".nom-boton").html("Iniciar");
    $("#terminar-partido").removeClass("disabled");
}
//Funcion que escucha los botones del archivo index.html al cargar el documento
function iniciar () {
    $("#terminar-partido").on("click", empezar);
    $("#detener-tiempo").on("click", pausa);
    $("#tiempo-local").on("click", pausa);
    $("#tiempo-visita").on("click", pausa);
    $("#tarjeta-local").on("click", pausa);
    $("#tarjeta-visita").on("click", pausa);
    $("#falta-local").on("click", pausa);
    $("#falta-visita").on("click", pausa);
    $("#gol-local").on("click", pausa);
    $("#gol-visita").on("click", pausa);
    //$(".btn").on("click", pausa);
    //empezar();
}
// Funcion que se ejecuta al cargar el detalle del partido Tarjetas, Faltas y Goles
function cargaDetalle () {
    $(".col-lg-3 > .btn").on("click", agregarDetalle);
}
// Funcion que se ejecuta al hacer click en los botones del detalle del partido en los numeros de los jugadores registrados
function agregarDetalle (datos) {
    swal({
        title: "Error!",
        text: "Here's my error message!",
        type: "error",
        confirmButtonText: "Cool"
    });
    $("#espere").html("");
    $("#espere").addClass("hidden");//Oculta el div del detalle
    $("#detener-tiempo").children(".nom-boton").html("Detener");
    continuar(); //continua con el crono
}












//Funcion que se carga al estar listo el documento index.html
$(document).on("ready", iniciar);