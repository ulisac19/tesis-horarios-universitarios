<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model 
{
	public $timestamps = false;

	protected $table = 'Seccion';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'numero',
							'materia_id', 
							'carrera_id', 
							'es_grupo', 
							'semestre', 
							'profesor_id',  
							);

	public function materia()
    {
        return $this->belongsTo('App\Models\Materia');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Models\Carrera');
    }

    public function profesores()
    {
        return $this->belongsTo('App\Models\Profesor');
    }
	
	public static function getSecciones($id)
	{
	return $cursor =  Seccion::where("semestre","=",$id)->get();
	}
}

?>