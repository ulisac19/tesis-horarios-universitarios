<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ParametrosTabu extends Model 
{
	public $timestamps = false;

	protected $table = 'parametrostabu';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'nombre', 
							'generacion_inicio', 
							'generacion_fin',
							'hijos_generacion',
							'descripcion',
							'tope_lista_tabu',
							'tiempo_maximo',
							'mejora_aceptable',
							'porcentaje_lista_elite'
							);
}

?>