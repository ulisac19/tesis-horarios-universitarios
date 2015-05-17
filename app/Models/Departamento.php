<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model 
{
	public $timestamps = false;

	protected $table = 'departamento';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'titulo', 
							'descripcion',
							);


	public function materias()
    {
        return $this->hasMany('App\Models\Materia');
    }

    public function profesores()
    {
        return $this->hasMany('App\Models\Profesor');
    }
}

?>