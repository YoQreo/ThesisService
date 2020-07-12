<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\ThesisCopy;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ThesisController extends Controller {
	use ApiResponser;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
    * Function to get all thesis
    * @return Illuminate\Http\Response
    */
    public function index(){
		$theses = Thesis::all();
		
		foreach($theses as $thesis){
			$authors = DB::table('thesis_authors')->where('thesis_id', '=', $thesis->id)->get();
			$thesis['authors'] = $authors;
		}  
		
        return $this->successResponse($theses, Response::HTTP_OK, 'S002');
	}
	
	/**
	 *
	 * Create an instance of Thesis
	 * @return Iluminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = [
			'type' => 'integer|required|in:1,2',
			'clasification' => 'string|required|max:15',
			'title' => 'string|required|max:200',
			'year' => 'string|required|date_format:Y',
			'school_id' => 'integer|min:1',
			'stand_id' => 'integer|min:1',
			'adviser' => 'string|max:50',
			'extension' => 'string|required|max:5',
			'observations' => 'string|required|max:50',
			'accompaniment' => 'string|required|max:50',
			'content' => 'string|required|max:200',
			'summary' => 'string|required|max:200',
			'recomendations' => 'string|max:200',
			'conclusions' => 'string|max:200',
			'bibliography' => 'string|max:200',
			'keywords' => 'string|max:200',
			'mention' => 'string|required|max:50',
			'authors' => 'required',
			'authors.*.author_id' => 'integer|required|min:1',
			'copies.*.incomeNumber' => 'string|required|max:10',
			'copies.*.barcode' => 'string|required|max:10',
			'copies.*.copy' => 'integer|required|min:1',
			'copies.*.status' => 'string|required|in:Prestado,En Espera,Deshabilitado,Disponible',
		];
		
		$this->validate($request, $rules);

		DB::beginTransaction();
		$thesis = Thesis::create($request->all());

		$authors = collect($request->authors)->map(function ($author) use ($thesis) {
			$validate = DB::table('thesis_authors')->insert(['thesis_id' => $thesis->id, 'author_id' => $author['author_id']]);
			if($validate){
				$author = DB::table('thesis_authors')->orderBy('id', 'desc')->first();
				return $author;
			}
		});
		
		$copies = collect($request->copies)->map(function ($copy) use ($thesis) {
			$copy = ThesisCopy::create($copy);
			$thesis->copies()->save($copy);
			return $copy;
		});
		DB::commit();

		$thesis['authors']=$authors;
		$thesis['copies']=$copies;

		return $this->successResponse($thesis, Response::HTTP_CREATED, 'S004');
	}
}
