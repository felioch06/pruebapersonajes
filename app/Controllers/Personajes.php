<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PersonajeModel;
use App\Models\CategoriaModel;
use App\Models\RelacionModel;

class Personajes extends BaseController
{

	//muetra la lista de  personajes
	public function index(){
		$PersonajeModel = new PersonajeModel;
		// consultas
		$personajes = $PersonajeModel->findAll();

		$compact = [ "personajes" => $personajes, "header" => view('personajes/templates/header'), "banner" => view('personajes/templates/banner'),"footer" => view('personajes/templates/footer'),]; 
		
		return view('personajes/index', $compact);
	}

	//muestra los detalles de cada personaje seleccionado
	public function detalles(){
		$req = \Config\Services::request();

		$PersonajeModel = new PersonajeModel;
		$CategoriaModel = new CategoriaModel;
		$RelacionModel = new RelacionModel;


		$id = $req->getPostGet('id');
		$personaje = $PersonajeModel->find($id);

		$categoria = $CategoriaModel->where('id_categoria',$personaje['fk_categoria'])->find();
		$relacion = $RelacionModel->where('fk_personaje_1',$personaje['id_personaje'])->findAll();

		$arr = [];
		$rel = [];

		for($i = 0; $i < count($relacion); $i++){
			array_push($arr, $relacion[$i]['fk_personaje_2']);
			array_push($rel, $PersonajeModel->find($arr[$i]));
		}

		$compact = [ "categoria" => $categoria, "personaje" => $personaje,  "relacion" => $rel,"header" => view('personajes/templates/header'), "banner" => view('personajes/templates/banner'),"footer" => view('personajes/templates/footer'),]; 
		
		return view('personajes/detalles', $compact);
	}

	//abre la vista para editar  un personaje
	public function editar(){
		$req = \Config\Services::request();

		$PersonajeModel = new PersonajeModel;
		$CategoriaModel = new CategoriaModel;

		$id = $req->getPostGet('id');

		// consultas
		$personaje = $PersonajeModel->find($id);
		$categorias = $CategoriaModel->findAll();

		$categoriaActual = $CategoriaModel->where('id_categoria',$personaje['fk_categoria'])->find();



		$compact = ["personaje" => $personaje, "categorias"=>$categorias , "categoriaActual"=>$categoriaActual ,"header" => view('personajes/templates/header'), "banner" => view('personajes/templates/banner'),"footer" => view('personajes/templates/footer'),]; 
		
		return view('personajes/editar', $compact);
	}

		//abre la vista para crear un personaje 

	public function crear(){

		$req = \Config\Services::request();

		$CategoriaModel = new CategoriaModel;
		// consultas
		$categorias = $CategoriaModel->findAll();

		$compact = ["categorias"=>$categorias, "header" => view('personajes/templates/header'), "banner" => view('personajes/templates/banner'),"footer" => view('personajes/templates/footer'),]; 
		
		return view('personajes/crear', $compact);
	}

	// abre la vista para crear una relación
	public function relacion(){

		$PersonajeModel = new PersonajeModel;
		// consultas
		$personajes = $PersonajeModel->findAll();

		$compact = [ "personajes" => $personajes, "header" => view('personajes/templates/header'), "banner" => view('personajes/templates/banner'),"footer" => view('personajes/templates/footer'),]; 
		
		return view('personajes/relacion', $compact);
	}

	//Guarda en la base de datos una relacion 

	public function guardarRelacion(){
		$req = \Config\Services::request();

		
		$data = [
			"fk_personaje_1"=>$req->getPostGet("fk_personaje_1"),
			"fk_personaje_2"=>$req->getPostGet("fk_personaje_2"),
		];

		$RelacionModel = new RelacionModel;
		// consultas
		$RelacionModel->insert($data);

		return redirect()->route('personajes');

	}

		//Guarda en la base de datos un personaje nuevo 

	public function guardar(){
		$req = \Config\Services::request();

		$name_file = $_FILES['foto']['name'];
		$tpm_name = $_FILES['foto']['tmp_name'];
		$imagen = 'public/img/'.$name_file;
		move_uploaded_file($tpm_name,'public/img/'. $name_file);

		$data = [
			"nombre"=>$req->getPostGet("nombre"),
			"edad"=>$req->getPostGet("edad"),
			"biografia"=>$req->getPostGet("biografia"),
			"fk_categoria"=>$req->getPostGet("fk_categoria"),
			"foto"=>$imagen
		];

		$PersonajeModel = new PersonajeModel;
		// consultas
		$PersonajeModel->insert($data);

		return redirect()->route('personajes');

	}

	//actualiza en la base de datos un personaje  

	public function actualizar(){
		$req = \Config\Services::request();
		$id = $req->getPostGet('id');

		$name_file = $_FILES['foto']['name'];
		$tpm_name = $_FILES['foto']['tmp_name'];
		$imagen = 'public/img/'.$name_file;

		$PersonajeModel = new PersonajeModel;
		// consultas
		$personaje = $PersonajeModel->find($id);

		// esta condición valida que la imagen no haya sufrido cambios a la hora de
		// actualizar en la base de datos y de borrar el archivo de la carpeta

		if($imagen == "public/img/"){

			$data = [
				"nombre"=>$req->getPostGet("nombre"),
				"edad"=>$req->getPostGet("edad"),
				"biografia"=>$req->getPostGet("biografia"),
				"fk_categoria"=>$req->getPostGet("fk_categoria"),
				"foto"=>$personaje['foto']
			];

			$PersonajeModel->update($id,$data);
		}else{
			unlink($personaje['foto']);
			move_uploaded_file($tpm_name,'public/img/'. $name_file);

			$data = [

				"nombre"=>$req->getPostGet("nombre"),
				"edad"=>$req->getPostGet("edad"),
				"biografia"=>$req->getPostGet("biografia"),
				"fk_categoria"=>$req->getPostGet("fk_categoria"),
				"foto"=>$imagen
			];

			$PersonajeModel->update($id,$data);
		}

		return redirect()->route('personajes');

	}

	// esta función elimina un personaje de la base de datos

	public function eliminar(){
		$req = \Config\Services::request();
		$id = $req->getPostGet('id');

		$PersonajeModel = new PersonajeModel;
		// consultas
		$personaje = $PersonajeModel->find($id);

		if($personaje['foto'] == "public/img/"){

			$personaje = $PersonajeModel->delete($id);
			return redirect()->route('personajes');

		}else{
			unlink($personaje['foto']);
			$personaje = $PersonajeModel->delete($id);
			return redirect()->route('personajes');
		}
		
	}
	
	//--------------------------------------------------------------------

}
