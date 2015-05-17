<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ParametrosGenetico extends Model 
{
	public $timestamps = false;

	protected $table = 'parametrosgenetico';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'titulo', 
							'generacion_inicio', 
							'generacion_fin',
							'hijos_generacion',
							'descripcion',
							'tiempo_maximo',
							'mejora_aceptable',
							'porcentaje_lista_elite',
							'probabilidad_cruce',
							'probabilidad_mutacion',
							'probabilidad_tabu',
							);
}

?>