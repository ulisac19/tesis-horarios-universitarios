<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tiposalon extends Model 
{
	public $timestamps = false;

	protected $table = 'tiposalon';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
				'id',
				'nombre', 
				   );


    public function salones()
    {
        return $this->hasMany('App\Models\Salon');
    }
    
    public static function getTiposalon($id)
    {
        $cursor = Tiposalon::find($id);
        return $cursor->nombre;
    }

	
}

?>