<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Hora extends Model 
{
	public $timestamps = false;

	protected $table = 'hora';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'nombre', 
							);
	
}

?>