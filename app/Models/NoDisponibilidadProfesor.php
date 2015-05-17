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

		
}

?>