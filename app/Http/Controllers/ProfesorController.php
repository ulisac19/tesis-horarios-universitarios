<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Models\Profesor;

class ProfesorController extends Controller 
{
        public function __construct()
	{
	//	$this->middleware('auth');
	}
        
        private $rules = array(
                            'nombre' => 'required|min:5|max:45',
                            'cedula' => 'required',
                            'departamento_id' => 'numeric',
        );
        
        private $msg = array(
                            'nombre.required' => 'Es obligatorio',
                            'nombre.min' => 'Al menos 5 caracteres',
                            'nombre.max' => 'Maximo 45 caracteres',
                            'cedula.required' => 'Es obligatorio',
                            'departamento_id.numeric' => 'Debe ser asignado',
        );
        
        public function cargarProfesor()
        {
            
            if(isset($_POST["cargarProfesor"]))
            {
                $validator = Validator::Make(Input::All(), $this->rules, $this->msg);
                if(!$validator->fails())
                {                    
                $profesor = new Profesor;
                $profesor->nombre = Input::get("nombre");
                $profesor->cedula = Input::get("cedula");
                $profesor->departamento_id = Input::get("departamento_id");
                $profesor->save();
                return Redirect::to("listaProfesores");
                }else{
                return redirect::to('cargarProfesor')->withErrors($validator)->withInput();
                }
            }else{
            $model = new Profesor;
            return view("profesor.cargarProfesor", array('cursor'=>$model));                
            }
        }
        
        public function listaProfesores()
        {
            $model = Profesor::All();
            return view("profesor.listaProfesores", array("cursor"=> $model));
        }
        
        public function editarProfesor($id)
        {
            if(isset($_POST["editarProfesor"]))
            {
                $validator = Validator::Make(Input::All(), $this->rules, $this->msg);
                if(!$validator->fails())
                {                    
                $profesor = Profesor::find(Input::get("id"));
                $profesor->nombre = Input::get("nombre");
                $profesor->cedula = Input::get("cedula");
                $profesor->departamento_id = Input::get("departamento_id");
                $profesor->push();
                return view("profesor.verProfesor", array("cursor"=>$profesor));
                }else{
                return redirect::to('editarProfesor')->withErrors($validator)->withInput();
                }
            }else{
            $model = Profesor::find($id);
            return view("profesor.editarProfesor", array('cursor'=>$model));                
            }
        }
        
        public function eliminarProfesor($id)
        {
            $model = Profesor::find($id);
            $model->delete();
            
            $cursor = Profesor::All();
            return redirect::to("listaProfesores");
        }
        
        public function verProfesor($id)
        {
            $model = Profesor::find($id);     
            return view("profesor.verProfesor", array("cursor"=>$model));
        }
       
}
        
?>