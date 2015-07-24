<?php 
$boton = "";
$equipo = "";
if(isset($_GET['boton'])){
	$boton_temp = explode("-", $_GET['boton']);
	$boton = $boton_temp[0];
}
if(isset($_GET['equipo'])){
	$equipo = $_GET['equipo'];
}
if($boton == "tarjeta"){
	$class = "warning";
}
elseif($boton == "falta"){
	$class = "danger";
}
elseif($boton == "gol"){
	$class = "info";
}
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php echo $equipo;?>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">1</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">2</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">3</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">4</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">5</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">6</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">7</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">8</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">9</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">10</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">11</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-<?php echo $class;?>">
			<div class="clearfix nom-boton">12</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
</div>
<script>cargaDetalle();</script>