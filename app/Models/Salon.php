<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model 
{
	public $timestamps = false;

	protected $table = 'salon';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'nombre', 
							'descripcion', 
							'tipoSalon_id', 
							);


    public function tiposalon()
    {
        return $this->belongsTo('App\Models\Tiposalon');
    }

	
}

?>