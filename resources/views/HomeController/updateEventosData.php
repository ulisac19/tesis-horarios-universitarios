<?php use App\Models\NoDisponibilidadProfesor;

	$newData = NoDisponibilidadProfesor::find($_GET["id"]);
	$newData->title = "No disponible";
	$newData->start = $_GET["start"];
	$newData->end = $_GET["end"];
	$newData->save();
?>