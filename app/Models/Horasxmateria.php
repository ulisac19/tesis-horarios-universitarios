<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Horasxmateria extends Model 
{
	public $timestamps = false;

	protected $table = 'horasxmateria';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'unidades_credito', 
							'horas_semana',
							);

	public function materias()
    {
        return $this->hasMany('App\Models\Materia');
    }

    public static function getUnidadesCredito($id)
    {
    	return Horasxmateria::find($id)->unidades_credito;
    }

    public static function getHorasSemana($id)
    {
    	return Horasxmateria::find($id)->horas_semana;
    }
}

?>