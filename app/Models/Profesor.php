<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model 
{
	public $timestamps = false;

	protected $table = 'profesor';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'nombre', 
							'cedula', 
							'departamento_id',  
							);
    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento');
    }

    public function secciones()
    {
        return $this->hasMany('App\Models\Seccion');
    }

    public static function cantidadMaterias($id)
    {
    	return Seccion::where('profesor_id', '=', $id)->count();
    }
	
}

?>