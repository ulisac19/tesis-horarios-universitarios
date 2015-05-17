<?php use App\Models\NoDisponibilidadProfesor;

	$newData = NoDisponibilidadProfesor::find($_GET["id"]);
	
	$newData->delete();
?>