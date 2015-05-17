<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tipomateria extends Model 
{
	public $timestamps = false;

	protected $table = 'tipomateria';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'nombre', 
							'descripcion', 
							);

	public function materias()
    {
        return $this->hasMany('App\Models\Materia');
    }

    public static function getNombre($id)
    {
    	return Tipomateria::find($id)->nombre;
    }
}

?>