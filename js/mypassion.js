var marcha = 0; //control del temporizador
var cro = 0; //estado inicial del cronómetro.
visor = $("#reloj"); //localizar pantalla del reloj

//Botón Iniciar: Estado empezar: Poner en marcha el crono
function empezar(datos) {
    var tipoBoton = $(this).children(".nom-boton").html();
    if(tipoBoton == '<i class="fa fa-play"></i> Iniciar'){
        $(".btn").removeClass("disabled");
        $(this).children(".nom-boton").html('<i class="fa fa-eject"></i> Terminar');
        $(this).addClass("disabled");
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
    //validamos que el tiempo sea inferior a 20 minutos
    if((mn < 20) && (sg < 60)){
        //llevar resultado al visor.
        visor.html(mn + ":" + sg + ":" + cs);
    }
    else{
        pausa();
        visor.html(mn + ":" + sg + ":00");
        $(".btn").addClass("disabled");
    }
     
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
        $(this).children(".hidden").append(tiempo_partido);
        $(this).addClass('disabled');
    }
    if((boton === 'tarjeta-local') || (boton === 'tarjeta-visita')){
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
    if((boton === 'falta-local') || (boton === 'falta-visita')){
        var botonTemp = boton.split('-');
        var botonShort = botonTemp[1];
        if(botonShort === 'local'){
            var equipo = $("#equipo-local").html();
        }
        else{
            var equipo = $("#equipo-visita").html();
        }
        $("#espere").removeClass("hidden");
        $("#espere").load("./faltas.php?boton="+boton+"&equipo="+encodeURI(equipo));
        marcha = 1;
    }
    if((boton === 'gol-local') || (boton === 'gol-visita')){
        var botonTemp = boton.split('-');
        var botonShort = botonTemp[1];
        if(botonShort === 'local'){
            var equipo = $("#equipo-local").html();
        }
        else{
            var equipo = $("#equipo-visita").html();
        }
        $("#espere").removeClass("hidden");
        $("#espere").load("./goles.php?boton="+boton+"&equipo="+encodeURI(equipo));
        marcha = 1;
    }

    var botonDetener = $("#detener-tiempo").children(".nom-boton").html();
    // Si la variable marcha es igual a 0 es por que el crono esta detenido 
    if (marcha == 0) { //con el boton en "continuar"
        $("#detener-tiempo").children(".nom-boton").html('<i class="fa fa-pause"></i> Detener');
        $("#terminar-partido").addClass("disabled");
        continuar(); //ir a la función continuar
    }
    else {  //con el botón en "Detener"
        $("#detener-tiempo").children(".nom-boton").html('<i class="fa fa-play"></i> Continuar');
        $("#terminar-partido").removeClass("disabled");
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
    $("#terminar-partido").children(".nom-boton").html('<i class="fa fa-play"></i> Iniciar');
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
// funcion que cierra el div oscuro de espere para seguir navegando en la aplicacion
function cerrarEspere () {
    $("#espere").addClass("hidden");
    $("#espere").html("");
}
// Funcion que se ejecuta al seleccionar el tipo de tarjeta que se va a imponer
function cargaTarjeta (datos) {
    var tipo = $(this).attr("name");
    $("#tipo-tarj").val(tipo);
    if(tipo === 'openid'){
        $('#espere').css({cursor: "url(img/icons/resaltamarillo.cur), none"});
        $('.btn-jugador').css({cursor: "url(img/icons/resaltamarillo.cur), none"});
    }
    else if(tipo === 'dropbox'){
        $('#espere').css({cursor: "url(img/icons/resaltazul.cur), none"});
        $('.btn-jugador').css({cursor: "url(img/icons/resaltazul.cur), none"});
    }
    else{
        $('#espere').css({cursor: "url(img/icons/resaltnaranja.cur), none"});
        $('.btn-jugador').css({cursor: "url(img/icons/resaltnaranja.cur), none"});
    }
    
    $(".btn-jugador").removeClass("disabled");
}
// funcion que coloca nueva clase al elemento luego de eliminar una tarjeta
function colocarNuevaClase (esto) {
    // obtenemos la cantidad de elementos i que existen dentro del elemento
    var cant_i = $(esto).children(".det-boton").children("i").size();
    // si la cantidad de elemtos i es mayor a 0 hace esto
    if(cant_i > 0){
        // obtenemos las clases que tiene el ultimo elemento i
        var class_i = $(esto).children(".det-boton").children("i:last").attr('class');
        // descomponemos las clases por espacio
        class_i = class_i.split(" ");
        // asignamos la ultima clase a nuestra nueva clase
        class_i = class_i[2];

    }
    // si no hay elemntos i dentro de nuestro elemnto jugador hace esto
    else{
        // asignamos como nueva clase la clase por default
        var class_i = 'btn-default';
        // agregamos un espacio al elemnto para que conserve el alto
        $(esto).children(".det-boton").html("&nbsp;");
    }
    // agregamos la nueva clase al elemnto
    $(esto).addClass(class_i);
}
// funcion que validara si ya existe una tarjeta para el jugador indicado
function comprobarTarjeta (esto, clase) {
    $(esto).children(".det-boton").children("i").each(function() {
        if(clase === 'openid'){
            tarjeta = "Amarilla";
        }
        else if(clase === 'dropbox'){
            tarjeta = "Azul";
        }
        else{
            tarjeta = "Roja";
        }
        var elemt_i = $(this);
        var class_i = $(this).attr('class');
        class_i = class_i.split(" ");
        class_i = class_i[2];
        class_i = class_i.split("-");
        class_i = class_i[1];
        if(class_i === clase){
            swal({
                title: "Atención!",
                text: "El jugador ya tiene tarjeta " + tarjeta + ".",
                type: "error",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonText: "Quitar",
                confirmButtonColor: "#BD362F",
                animation: "slide-from-top"
            },
            function(){
                $(esto).removeClass('btn-' + clase);
                $(elemt_i).remove();
                colocarNuevaClase(esto);
            });
        }
    });
}
// Funcion que se ejecuta al hacer click en los botones del detalle del partido en los numeros de los jugadores registrados tarjetas
function agregarDetalleTarjetas (datos) {
    var tipo = $("#tipo-tarj").val();
    // si el boton del jugador no tiene ninguba tarjeta hace esto
    if($(this).hasClass('btn-default')){
        var esto = $(this);
        // mostramos mensaje para ingresar observacion del por que la tarjeta para luego mostrar en el informe
        swal({
            title: "Observación!",
            text: "Digite el motivo de la sanción:",
            type: "input",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            confirmButtonText: "Continuar",
            confirmButtonColor: "#51A351",
            animation: "slide-from-top",
            inputPlaceholder: "Motivo de la sanción"
        },
        function(inputValue){
            if (inputValue === false)
                return false;
            if (inputValue === "") {
                swal.showInputError("Debe escribir algo!");
                return false;
            }
            swal({
                title: "Correcto!",
                text: "Usted Escribio: " + inputValue,
                type: "success",
                confirmButtonText: "Continuar",
                confirmButtonColor: "#51A351",
                animation: "slide-from-top"
            });
            // quitamos la clase default
            $(esto).removeClass('btn-default');
            // agregamos el icono que simboliza una tarjeta con el color defondo del tipo de tarjeta impuesta
            $(esto).children('.det-boton').html(' <i class="fa fa-square-o btn-'+tipo+'"></i>');
            // colocamos color de fondo de la tarjeta impuesta actualmente para siempre mantener actualizado el boton
            $(esto).addClass('btn-'+tipo);
        });
    }
    else if($(this).hasClass('btn-openid')){
        var esto = $(this);
        if(tipo === 'openid'){           
            comprobarTarjeta (esto, 'openid');
        }
        else{
            // mostramos mensaje para ingresar observacion del por que la tarjeta para luego mostrar en el informe
            swal({
                title: "Observación!",
                text: "Digite el motivo de la sanción:",
                type: "input",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                confirmButtonText: "Continuar",
                confirmButtonColor: "#51A351",
                animation: "slide-from-top",
                inputPlaceholder: "Motivo de la sanción"
            },
            function(inputValue){
                if (inputValue === false)
                    return false;
                if (inputValue === "") {
                    swal.showInputError("Debe escribir algo!");
                    return false;
                }
                swal({
                    title: "Correcto!",
                    text: "Usted Escribio: " + inputValue,
                    type: "success",
                    confirmButtonText: "Continuar",
                    confirmButtonColor: "#51A351",
                    animation: "slide-from-top"
                });
                $(esto).removeClass('btn-openid');
                $(esto).children('.det-boton').append(' <i class="fa fa-square-o btn-'+tipo+'"></i>');
                $(esto).addClass('btn-'+tipo);
            });
        }
    }
    else if($(this).hasClass('btn-dropbox')){
        var esto = $(this);
        if(tipo === 'dropbox'){
            comprobarTarjeta (esto, 'dropbox');
        }
        else{
            if(tipo !== 'openid'){
                // mostramos mensaje para ingresar observacion del por que la tarjeta para luego mostrar en el informe
                swal({
                    title: "Observación!",
                    text: "Digite el motivo de la sanción:",
                    type: "input",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false,
                    confirmButtonText: "Continuar",
                    confirmButtonColor: "#51A351",
                    animation: "slide-from-top",
                    inputPlaceholder: "Motivo de la sanción"
                },
                function(inputValue){
                    if (inputValue === false)
                        return false;
                    if (inputValue === "") {
                        swal.showInputError("Debe escribir algo!");
                        return false;
                    }
                    swal({
                        title: "Correcto!",
                        text: "Usted Escribio: " + inputValue,
                        type: "success",
                        confirmButtonText: "Continuar",
                        confirmButtonColor: "#51A351",
                        animation: "slide-from-top"
                    });
                    $(esto).removeClass('btn-dropbox');
                    $(esto).children('.det-boton').append(' <i class="fa fa-square-o btn-'+tipo+'"></i>');
                    $(esto).addClass('btn-'+tipo);
                });
            }
            else{
                swal({
                    title: "Atención!",
                    text: "Esta acción no es lógica.",
                    type: "error",
                    confirmButtonText: "Volver",
                    confirmButtonColor: "#BD362F",
                    animation: "slide-from-top"
                });
            }
        }
    }
    else if($(this).hasClass('btn-pinterest')){
        var esto = $(this);
        if(tipo === 'pinterest'){
            comprobarTarjeta (esto, 'pinterest');
        }
        else{
            swal({
                title: "Atención!",
                text: "Esta acción no es lógica.",
                type: "error",
                confirmButtonText: "Volver",
                confirmButtonColor: "#BD362F",
                animation: "slide-from-top"
            });
        }
    }
}
// Funcion que se ejecuta al cargar el detalle del partido Tarjetas
function cargaDetalleTarjetas () {
    $(".tipo_tarjeta").on("click", cargaTarjeta);
    $(".btn-jugador").on("click", agregarDetalleTarjetas);
    $(".fa-times").parent("div").on("click", cerrarEspere);
    $(".fa-times").on("click", cerrarEspere);
    $('.fa-times').parent("div").css("cursor", "pointer");
}
// Funcion que se ejecuta al hacer click en los botones del detalle del partido en los numeros de los jugadores registrados faltas
function agregarDetalleFaltas (datos) {
    // si el boton del jugador no tiene ninguba tarjeta hace esto
    if($(this).hasClass('btn-default')){
        var esto = $(this);
        // mostramos mensaje para ingresar observacion del por que la tarjeta para luego mostrar en el informe
        swal({
            title: "Observación!",
            text: "Digite el motivo de la sanción:",
            type: "input",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            confirmButtonText: "Continuar",
            confirmButtonColor: "#51A351",
            animation: "slide-from-top",
            inputPlaceholder: "Motivo de la sanción"
        },
        function(inputValue){
            if (inputValue === false)
                return false;
            if (inputValue === "") {
                swal.showInputError("Debe escribir algo!");
                return false;
            }
            swal({
                title: "Correcto!",
                text: "Usted Escribio: " + inputValue,
                type: "success",
                confirmButtonText: "Continuar",
                confirmButtonColor: "#51A351",
                animation: "slide-from-top"
            });
            // quitamos la clase default
            $(esto).removeClass('btn-default');
            // agregamos el icono que simboliza una tarjeta con el color defondo del tipo de tarjeta impuesta
            $(esto).children('.det-boton').html(' <i class="fa fa-ambulance"></i>');
            // colocamos color de fondo de la tarjeta impuesta actualmente para siempre mantener actualizado el boton
            $(esto).addClass('btn-pinterest');
        });
    }
    else{
        var esto = $(this);
        if($(esto).children('.det-boton').children('i').size() >= 5){
            swal({
                title: "Atención!",
                text: "El jugador ya tiene 5 Faltas.",
                type: "error",
                confirmButtonText: "Volver",
                confirmButtonColor: "#BD362F",
                animation: "slide-from-top"
            });
        }
        else{
            // mostramos mensaje para ingresar observacion del por que la tarjeta para luego mostrar en el informe
            swal({
                title: "Observación!",
                text: "Digite el motivo de la sanción:",
                type: "input",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                confirmButtonText: "Continuar",
                confirmButtonColor: "#51A351",
                animation: "slide-from-top",
                inputPlaceholder: "Motivo de la sanción"
            },
            function(inputValue){
                if (inputValue === false)
                    return false;
                if (inputValue === "") {
                    swal.showInputError("Debe escribir algo!");
                    return false;
                }
                swal({
                    title: "Correcto!",
                    text: "Usted Escribio: " + inputValue,
                    type: "success",
                    confirmButtonText: "Continuar",
                    confirmButtonColor: "#51A351",
                    animation: "slide-from-top"
                });
                $(esto).removeClass('btn-openid');
                $(esto).children('.det-boton').append(' <i class="fa fa-ambulance"></i>');
                $(esto).addClass('btn-pinterest');
            });
        }
    }
}
// Funcion que se ejecuta al cargar el detalle del partido Faltas
function cargaDetalleFaltas () {
    $(".btn").on("click", agregarDetalleFaltas);
    $(".fa-times").parent("div").on("click", cerrarEspere);
    $(".fa-times").on("click", cerrarEspere);
}
// Funcion que se ejecuta al cargar el detalle del partido Goles
function cargaDetalleGoles () {
    $(".btn").on("click", agregarDetalleGoles);
    $(".fa-times").parent("div").on("click", cerrarEspere);
    $(".fa-times").on("click", cerrarEspere);
}
// Funcion que se ejecuta al hacer click en los botones del detalle del partido en los numeros de los jugadores registrados
function agregarDetalleGoles (datos) {
    // si el boton del jugador no tiene ninguba tarjeta hace esto
    if($(this).hasClass('btn-default')){
        var esto = $(this);
        // quitamos la clase default
        $(esto).removeClass('btn-default');
        // agregamos el icono que simboliza una tarjeta con el color defondo del tipo de tarjeta impuesta
        $(esto).children('.det-boton').html('<i class="fa fa-futbol-o"></i> X 1');
        $(esto).children('.nom-boton').children('input').val(1);
        // colocamos color de fondo de la tarjeta impuesta actualmente para siempre mantener actualizado el boton
        $(esto).addClass('btn-yahoo');
    }
    else{
        var esto = $(this);
        var goles = $(esto).children('.nom-boton').children('input').val();
        var total = parseInt(goles) + 1;
        $(esto).children('.det-boton').html('<i class="fa fa-futbol-o"></i> X ' + total);
        $(esto).children('.nom-boton').children('input').val(total);
    }
}












//Funcion que se carga al estar listo el documento index.html
$(document).on("ready", iniciar);