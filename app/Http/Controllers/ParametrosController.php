<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Models\ParametrosTabu;
use App\Models\ParametrosGenetico;

class ParametrosController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Parametros Controller
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

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	
  	private $rules_genetico = array(
						'nombre' => 'required|min:5|max:45',
						'generacion_inicio' => 'required|numeric',
						'generacion_fin' => 'required|numeric',
						'hijos_generacion' => 'required|numeric',
						'descripcion' => 'required',
						'tiempo_maximo' => 'required',
						'mejora_aceptable' => 'required',
						'porcentaje_lista_elite' => 'required',
						'probabilidad_cruce'=>'required',
						'probabilidad_mutacion'=>'required',
						'probabilidad_tabu'=>'required',
					);

  	private $messages_genetico = array(

						'nombre.required' => 'Campo obligatorio',
						'nombre.min' => 'Debe ser mayor de 5 caracteres',
						'nombre.max' => 'Debe ser menor a 45 caracteres',
						'generacion_inicio.required' => 'Campo obligatorio',
						'generacion_inicio.numeric' => 'Debe ser un numero',
						'generacion_fin.required' => 'Campo obligatorio',
						'generacion_fin.numeric' => 'Debe ser un numero',
						'hijos_generacion.required' => 'Campo obligatorio',
						'hijos_generacion.numeric' => 'Debe ser un numero',
						'descripcion.required' => 'Campo obligatorio',
						'tiempo_maximo.required' => 'Campo obligatorio',
						'mejora_aceptable.required' => 'Campo obligatorio',
						'porcentaje_lista_elite.required' => 'Campo obligatorio',
						'probabilidad_cruce.required' => 'Campo obligatorio',
						'probabilidad_mutacion.required' => 'Campo obligatorio',
						'probabilidad_tabu.required' => 'Campo obligatorio',
					);

	private $rules_tabu = array(
						'nombre' => 'required|min:5|max:45',
						'generacion_inicio' => 'required|numeric',
						'generacion_fin' => 'required|numeric',
						'hijos_generacion' => 'required|numeric',
						'descripcion' => 'required',
						'tope_lista_tabu' => 'required',
						'tiempo_maximo' => 'required',
						'mejora_aceptable' => 'required',
						'porcentaje_lista_elite' => 'required',
					);
	private $messages_tabu = array(

						'nombre.required' => 'Campo obligatorio',
						'nombre.min' => 'Debe ser mayor de 5 caracteres',
						'nombre.max' => 'Debe ser menor a 45 caracteres',
						'generacion_inicio.required' => 'Campo obligatorio',
						'generacion_inicio.numeric' => 'Debe ser un numero',
						'generacion_fin.required' => 'Campo obligatorio',
						'generacion_fin.numeric' => 'Debe ser un numero',
						'hijos_generacion.required' => 'Campo obligatorio',
						'hijos_generacion.numeric' => 'Debe ser un numero',
						'descripcion.required' => 'Campo obligatorio',
						'tope_lista_tabu.required' => 'Campo obligatorio',
						'tiempo_maximo.required' => 'Campo obligatorio',
						'mejora_aceptable.required' => 'Campo obligatorio',
						'porcentaje_lista_elite.required' => 'Campo obligatorio',
							 );

	/*expresion regex:/^[a-z]$/i|
	*
	*
	/*******************************
  	 ** Acciones del modelo TABU  **
  	 *******************************
  	*
  	*
	*/
	public function tabu()
	{			
		if(isset($_POST["tabu"]))
		{

			$validator = Validator::make(Input::All(), $this->rules_tabu, $this->messages_tabu);

			

			if(!$validator->fails())
			{ 				
				$nueva_config_tabu = new ParametrosTabu;
				$nueva_config_tabu->nombre = Input::get('nombre');
				$nueva_config_tabu->generacion_inicio = Input::get('generacion_inicio');
				$nueva_config_tabu->generacion_fin = Input::get('generacion_fin');
				$nueva_config_tabu->hijos_generacion = Input::get('hijos_generacion');
				$nueva_config_tabu->descripcion = Input::get('descripcion');
				$nueva_config_tabu->tope_lista_tabu = Input::get('tope_lista_tabu');
				$nueva_config_tabu->tiempo_maximo = Input::get('tiempo_maximo');
				$nueva_config_tabu->mejora_aceptable = Input::get('mejora_aceptable');
				$nueva_config_tabu->porcentaje_lista_elite = Input::get('porcentaje_lista_elite');

				$nueva_config_tabu->save();
				
				return view('parametros.tabu');
			}else{			
				
				return Redirect::to('tabu')->withErrors($validator)->withInput();
			}
		}else{
			return view('parametros.tabu');
		}			

	}

	public function listaTabu()
	{
		$cursor = ParametrosTabu::All();
		return view('parametros.listaTabu', array(
											'cursor' => $cursor,
												));
	}

	public function editarTabu($id)
	{

		if(isset($_POST["editarTabu"]))
		{ 
			

			$validator = Validator::make(Input::All(), $this->rules_tabu, $this->messages_tabu);

			


			if(!$validator->fails())
			{ 				
				$nueva_config_tabu = ParametrosTabu::find($_POST["id"]);
				$nueva_config_tabu->nombre = Input::get('nombre');
				$nueva_config_tabu->generacion_inicio = Input::get('generacion_inicio');
				$nueva_config_tabu->generacion_fin = Input::get('generacion_fin');
				$nueva_config_tabu->hijos_generacion = Input::get('hijos_generacion');
				$nueva_config_tabu->descripcion = Input::get('descripcion');
				$nueva_config_tabu->tope_lista_tabu = Input::get('tope_lista_tabu');
				$nueva_config_tabu->tiempo_maximo = Input::get('tiempo_maximo');
				$nueva_config_tabu->mejora_aceptable = Input::get('mejora_aceptable');
				$nueva_config_tabu->porcentaje_lista_elite = Input::get('porcentaje_lista_elite');
				$nueva_config_tabu->push();
				$cursor = ParametrosTabu::find($_POST["id"]);
				
				return view('parametros.verTabu',array('cursor'=>$cursor));
			}else{		
				return Redirect::to('editarTabu')->withErrors($validator)->withInput();
			}
		}else{
			$cursor = ParametrosTabu::find($id);
			return view('parametros.editarTabu',array('cursor'=>$cursor));
		}
	}

	public function verTabu($id)
	{
		$cursor = ParametrosTabu::find($id);
		return view('parametros.verTabu',array('cursor'=>$cursor));
	}

	public function eliminarListaTabu($id)
	{
		$user = ParametrosTabu::find($id);
		$user->delete();

		$cursor = ParametrosTabu::All();
		return redirect()->route('listaTabu', array('cursor' => $cursor));


	}


	/*
	*
	*
	/***********************************
  	 ** Acciones del modelo GENETICO  **
  	 ***********************************
  	*
  	*
	*/


	public function eliminarListaGenetico($id)
	{
		$user = ParametrosGenetico::find($id);
		$user->delete();

		$cursor = ParametrosGenetico::All();
		return redirect()->route('listaGenetico', array('cursor' => $cursor));
	}

	public function genetico()
	{
		if(isset($_POST["genetico"]))
		{
			$validator = Validator::make(Input::All(), $this->rules_genetico , $this->messages_genetico);

			

			if(!$validator->fails())
			{ 				
				$nueva_config_genetico = new ParametrosGenetico;
				$nueva_config_genetico->nombre = Input::get('nombre');
				$nueva_config_genetico->generacion_inicio = Input::get('generacion_inicio');
				$nueva_config_genetico->generacion_fin = Input::get('generacion_fin');
				$nueva_config_genetico->hijos_generacion = Input::get('hijos_generacion');
				$nueva_config_genetico->descripcion = Input::get('descripcion');
				$nueva_config_genetico->tiempo_maximo = Input::get('tiempo_maximo');
				$nueva_config_genetico->mejora_aceptable = Input::get('mejora_aceptable');
				$nueva_config_genetico->porcentaje_lista_elite = Input::get('porcentaje_lista_elite');
				$nueva_config_genetico->probabilidad_tabu = Input::get('probabilidad_tabu');
				$nueva_config_genetico->probabilidad_mutacion = Input::get('probabilidad_mutacion');
				$nueva_config_genetico->probabilidad_cruce = Input::get('probabilidad_cruce');

				$nueva_config_genetico->save();
				$cursor = ParametrosGenetico::find($nueva_config_genetico->id);
				return view('parametros.verGenetico',array('cursor'=>$cursor));
				
			}else{							
				return Redirect::to('genetico')->withErrors($validator)->withInput();
			}
		}else{
			return view('parametros.genetico');
		}
	}

	public function listaGenetico()
	{	
		$cursor = ParametrosGenetico::All();
		return view('parametros.listaGenetico', array(
											'cursor' => $cursor,
												));
	}

	public function verGenetico($id)
	{
		$cursor = ParametrosGenetico::find($id);
		return view('parametros.verGenetico',array('cursor'=>$cursor));
	}

	public function editarGenetico($id)
	{

		if(isset($_POST["editarGenetico"]))
		{
			

			$validator = Validator::make(Input::All(), $this->rules_genetico , $this->messages_genetico);

			

			if(!$validator->fails())
			{ 				
				$nueva_config_genetico = ParametrosGenetico::find($_POST["id"]);
				$nueva_config_genetico->nombre = Input::get('nombre');
				$nueva_config_genetico->generacion_inicio = Input::get('generacion_inicio');
				$nueva_config_genetico->generacion_fin = Input::get('generacion_fin');
				$nueva_config_genetico->hijos_generacion = Input::get('hijos_generacion');
				$nueva_config_genetico->descripcion = Input::get('descripcion');
				$nueva_config_genetico->tiempo_maximo = Input::get('tiempo_maximo');
				$nueva_config_genetico->mejora_aceptable = Input::get('mejora_aceptable');
				$nueva_config_genetico->porcentaje_lista_elite = Input::get('porcentaje_lista_elite');
				$nueva_config_genetico->probabilidad_tabu = Input::get('probabilidad_tabu');
				$nueva_config_genetico->probabilidad_mutacion = Input::get('probabilidad_mutacion');
				$nueva_config_genetico->probabilidad_cruce = Input::get('probabilidad_cruce');

				$nueva_config_genetico->push();
				$cursor = ParametrosGenetico::find($_POST["id"]);
				
				return view('parametros.verGenetico',array('cursor'=>$cursor));
			}else{		
				return Redirect::to('editarGenetico')->withErrors($validator)->withInput();
			}
		}else{
			$cursor = ParametrosGenetico::find($id);
			return view('parametros.editarGenetico',array('cursor'=>$cursor));
		}



	}


}

