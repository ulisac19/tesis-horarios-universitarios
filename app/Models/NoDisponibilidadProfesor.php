<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NoDisponibilidadProfesor extends Model 
{
	public $timestamps = false;

	protected $table = 'nodisponibilidadprofesor';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'nombre', 
							'inicio', 
							'fin', 
							'bloqueHorario_id',
							'profesor_id',
							);

	public static function getBloques($datetimeI, $datetimeF)
	{
		
		$cadenaI = explode(" ", $datetimeI);
		$vectorI = explode(":", $cadenaI[1]);
		$horaI = $vectorI[0];

		$cadenaF = explode(" ", $datetimeF);
		$vectorF = explode(":", $cadenaF[1]);
		$horaF = $vectorF[0];

		
		$fecha = explode("-", $cadenaF[0]);
		$dia =  date("w", mktime(0, 0, 0, $fecha[1], $fecha[2], $fecha[0]));
		return [$horaI, $horaF, $dia];
	}

		
}

?>