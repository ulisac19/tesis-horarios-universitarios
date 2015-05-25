<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Models\Salon;

class SalonController extends Controller 
{
        public function __construct()
	{
	//	$this->middleware('auth');
	}
        
        private $rules = array(
                            'nombre' => 'required|min:3|max:15',
                            'descripcion' => 'required|min:15|max:45',
                            'tipoSalon_id' => 'numeric',
        );
        
        private $msg = array(
                            'nombre.required' => 'Es obligatorio',
                            'nombre.min' => 'Al menos 5 caracteres',
                            'nombre.max' => 'Maximo 15 caracteres',
                            'descripcion.required' => 'Es obligatorio',
                            'descripcion.min' => 'Al menos 15 caracteres',
                            'descripcion.max' => 'Maximo 45 caracteres',
                            'departamento_id.numeric' => 'Debe ser asignado',
        );
        
        public function cargarSalon()
        {
            
            if(isset($_POST["cargarSalon"]))
            {
                $validator = Validator::Make(Input::All(), $this->rules, $this->msg);
                if(!$validator->fails())
                {                    
                $salon = new Salon;
                $salon->nombre = Input::get("nombre");
                $salon->descripcion = Input::get("descripcion");
                $salon->tipoSalon_id = Input::get("tipoSalon_id");
                $salon->save();
                return Redirect::to("listaSalones");
                }else{
                return redirect::to('cargarSalon')->withErrors($validator)->withInput();
                }
            }else{
            $model = new Salon;
            return view("salon.cargarSalon", array('cursor'=>$model));                
            }
        }
        
        public function listaSalones()
        {
            $model = Salon::All();
            return view("salon.listaSalones", array("cursor"=> $model));
        }
        
        public function editarSalon($id)
        {
            if(isset($_POST["editarSalon"]))
            {
                $validator = Validator::Make(Input::All(), $this->rules, $this->msg);
                if(!$validator->fails())
                {                    
                $salon = Salon::find(Input::get("id"));
                $salon->nombre = Input::get("nombre");
                $salon->descripcion = Input::get("descripcion");
                $salon->tipoSalon_id = Input::get("tipoSalon_id");
                $salon->push();
                return view("salon.verSalon", array("cursor"=>$salon));
                }else{
                return redirect::to('editarSalon')->withErrors($validator)->withInput();
                }
            }else{
            $model = Salon::find($id);
            return view("salon.editarSalon", array('cursor'=>$model));                
            }
        }
        
        public function eliminarSalon($id)
        {
            $model = Salon::find($id);
            $model->delete();
            
            $cursor = Salon::All();
            return redirect::to("listaSalones");
        }
        
        public function verSalon($id)
        {
            $model = Salon::find($id);     
            return view("salon.verSalon", array("cursor"=>$model));
        }
       
}
        
?>