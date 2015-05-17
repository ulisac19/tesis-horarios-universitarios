<?php use App\Models\NoDisponibilidadProfesor;

	$newData = new NoDisponibilidadProfesor;
	$newData->title = "No disponible";
	$newData->start = $_GET["start"];
	$newData->end = $_GET["end"];
	$newData->profesor_id = $_GET["profesor"];
	$newData->save();
?>