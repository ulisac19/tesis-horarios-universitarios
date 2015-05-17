<?php   use App\Models\NoDisponibilidadProfesor;

$cursor = NoDisponibilidadProfesor::where("profesor_id", "=", $profesor)->get()->toJson();
echo $cursor; 
?>