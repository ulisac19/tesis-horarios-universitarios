<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model 
{
	public $timestamps = false;

	protected $table = 'carrera';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'nombre', 
							);


	public function secciones()
    {
        return $this->hasMany('App\Models\Seccion');
    }

	
}

?>