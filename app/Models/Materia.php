<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model 
{
	public $timestamps = false;

	protected $table = 'materia';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'nombre', 
							'codigo', 
							'unidades_credito', 
							'departamento_id', 
							'requiere_laboratorio', 
							);

	public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento');
    }

    public function horasxmateria()
    {
        return $this->belongsTo('App\Models\Horasxmateria');
    }

    public function tipomateria()
    {
        return $this->belongsTo('App\Models\Tipomateria');
    }

    public function secciones()
    {
        return $this->hasMany('App\Models\Seccion');
    }
	
}

?>