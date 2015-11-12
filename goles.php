<?php 
$boton = "";
$equipo = "";
$titulo = "";
if(isset($_GET['boton'])){
	$boton_temp = explode("-", $_GET['boton']);
	$boton = $boton_temp[0];
	$equipo = $boton_temp[1];
}
if(isset($_GET['equipo'])){
	$titulo = $_GET['equipo'];
}
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
		<?php echo $titulo;?>
		<input type="hidden" name="equipo" id="equipo" class="form-control" value="<?php echo $equipo;?>">
	</div>
	<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
		<i class="fa fa-times"></i>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">1<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">2<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">3<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">4<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">5<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">6<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">7<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">8<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">9<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">10<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">11<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 btn btn-default">
			<div class="clearfix nom-boton">12<input type="hidden" class="form-control" value=""></div>
			<div class="clearfix det-boton">&nbsp;</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
	</div>
</div>
<script>cargaDetalleGoles();</script>