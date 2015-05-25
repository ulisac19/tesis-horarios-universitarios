<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model 
{
	public $timestamps = false;

	protected $table = 'dia';

	protected $hidden = ['created_at', 'updated_at'];

	protected $fillable = array(
							'id',
							'dia_numero', 
							'dia_letra', 
							);
	
}

?>