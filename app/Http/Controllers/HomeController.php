<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Models\Materia;
use App\Models\Seccion;
use App\Models\Profesor;
use App\Models\NoDisponibilidadProfesor;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	//	$this->middleware('auth');
	}

	private $rules_materia = array(
						'nombre' => 'required', 
						'codigo' => 'required|unique:Materia', 
						'unidades_credito' => 'required|numeric', 
						'departamento_id' => 'required|numeric', 
						'requiere_laboratorio' => 'numeric', 
					);

  	private $messages_materia = array(

						'nombre.required' => 'Campo obligatorio',
						'codigo.required' => 'Campo obligatorio',
						'codigo.unique' => 'Materia ya existe',
						'unidades_credito.required' => 'Campo obligatorio',
						'departamento_id.required' => 'Campo obligatorio',
						'departamento_id.numeric' => 'Debe ser un numero',
						'departamento_id.numeric' => 'Debe ser un numero',
						'requiere_laboratorio.numeric' => 'Debe ser un numero',
					);
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	public function cargarMateria()
	{ 
		if(isset($_POST["cargarMateria"]))
		{
			$validator = Validator::make(Input::All(), $this->rules_materia, $this->messages_materia);

			if(!$validator->fails())
			{ 				
				$nueva_materia = new Materia;
				$nueva_materia->nombre = Input::get('nombre');
				$nueva_materia->codigo = Input::get('codigo');
				$nueva_materia->unidades_credito = Input::get('unidades_credito');
				$nueva_materia->departamento_id = Input::get('departamento_id');
				$nueva_materia->requiere_laboratorio = Input::get('requiere_laboratorio');

				if($nueva_materia->save())
				{
					$i = 0;
					foreach($_POST["carrera"] as $item´)
					{	
						$nueva_seccion = new Seccion;
						$nueva_seccion->materia_id = $nueva_materia->id;
						$nueva_seccion->carrera_id = $_POST["carrera"][$i];
						$nueva_seccion->numero = $_POST["seccion"][$i];
						$nueva_seccion->semestre = $_POST["semestre"][$i];
						$nueva_seccion->save();
						unset($nueva_seccion);
						$i++;
					}

				}
				

				return view('HomeController.cargarMateria');
			}else{			
				
				return Redirect::to('cargarMateria')->withErrors($validator)->withInput();
			}
		}else{
			return view('HomeController.cargarMateria');
		}
	}


	public function listaMaterias()
	{	
		$cursor = Seccion::All();
		return view('HomeController.listaMaterias', array(
											'cursor' => $cursor,
												));
	}

	public function cargarMateriasProfesor()
	{   


		$profesores = Profesor::All();
		$cadenaP = "[";
		foreach ($profesores as $value) 
		{
			$cadenaP = $cadenaP."{value:'".$value->nombre."'},";
		}
		$cadenaP = $cadenaP."]";


		$cadenaS ="";
		$secciones = Seccion::All();
        
        $cadenaS = $cadenaS."[";
        foreach ($secciones as $value) 
        {
            $cadenaS = $cadenaS."{value:'".$value->materia->nombre." - ".$value->materia->codigo." - Seccion ".$value->numero."'},";
        }
        $cadenaS = $cadenaS."]}";

        if(isset($_POST["cargarMateriasProfesor"]))
        {
        	$profesor = Profesor::where("nombre", "=" ,$_POST["profesor"])->get();
        	$id_profesor = "";
        	foreach ($profesor as $item) 
        	{
        		$id_profesor = $item->id;
        	}

        	foreach ($_POST["seccion"] as $seccion)
        	{
        		    $materia_codigo_seccion = explode("-", $seccion);
        		    $materia = rtrim(ltrim($materia_codigo_seccion[0]));
        			$codigo = rtrim(ltrim($materia_codigo_seccion[1]));
        			$seccion_vector = explode(" ",rtrim(ltrim($materia_codigo_seccion[2])));
        			$seccionN = $seccion_vector[1];
        			
        			
        							/*
        							* Materia  -  codigo -  seccion
        							* $materia -  $codigo - $seccionN 
        							*/
        			$materias = new Materia;
        			$materias = Materia::where("codigo", "=", $codigo)->get();


        			foreach ($materias as $mat) 
        			{
        				$secciones2 = Seccion::where("numero", "=", $seccionN)->where("materia_id", "=", $mat->id)->get();
        				
        				foreach ($secciones2 as $item2) 
        				{
        					$seccion_salvar = Seccion::find($item2->id);
        					$seccion_salvar->profesor_id = $id_profesor;
        					$seccion_salvar->push();
        				}
        			}


        	} 

        }

		return view('HomeController.cargarMateriasProfesor', array(
											'cadenaP' => $cadenaP,
											'cadenaS' => $cadenaS,
												));
	}

	public function listaMateriasProfesor()
	{	
		$profesor = Profesor::All();
		return view('HomeController.listaMateriasProfesor', array(
											'profesor'=>$profesor
			));
	}	

	public function grupoMaterias()
	{	
		$i = 0;
		if(isset($_POST["grupoMaterias"]))
		{
			if(is_array($_POST["identificador"]))
			{
				foreach ($_POST["identificador"] as $item) 
				{
					$seccion = Seccion::find($item);
					$seccion->es_grupo = $_POST["radio".$i];
					$seccion->save();
					$i++;
				}
			}
			
		}
		return view('HomeController.grupoMaterias');
		
	}

	public function eliminarListaSeccion($id)
	{
		$seccion = Seccion::find($id);
		$seccion->delete();

		$cursor = Seccion::All();
		return redirect()->route('listaMaterias', array('cursor' => $cursor));


	}
	
	public function cargarData($id)
	{
		return view('HomeController.cargarData' , array('id'=>$id));
	}

	public function disponibilidadProfesores($id)
	{
		$cursor = Profesor::find($id);
		return view('HomeController.disponibilidadProfesores' ,array(
									'cursor'=>$cursor
					));
	}

	public function getEventosData($profesor)
	{
		return view('HomeController.getEventosData', array('profesor'=>$profesor));
	}

	public function setEventosData($start, $end, $profesor)
	{
		$newData = new NoDisponibilidadProfesor;
		$newData->title = "No disponible";
		$newData->start = $start;
		$newData->end = $end;
		$newData->profesor_id = $profesor;
		$newData->save();
		// return view('HomeController.setEventosData');
	}

	public function updateEventosData($start, $end, $id, $profesor)
	{
		return view('HomeController.updateEventosData');
	}
	public function deleteEventoData($id, $profesor)
	{
		return view('HomeController.deleteEventoData');
	}
}
