<?php

use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;

class DeleteThesisTest extends TestCase
{
    /*
     *Trait to callback the BD
    */
    use DatabaseMigrations;
        
    /**************************************************
     *             DELETE A THESIS
     **************************************************/

    /**
     * @test 
     * @author Gutierrez Villanueva Katty Susana
     * @testdox Test para eliminar una tesis
     * mediante una ruta de nombre deleteThesis
     */

    public function valid_delete_a_thesis() {
        // Ingresamos registros de tesis
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id, 'status' => 'Disponible']);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        $this->seeInDatabase('theses', $thesis->toArray());
        
        //comprobar codigo de respuesta
        $this->delete(route('deleteThesis', ['id' => $thesis->id]))
        ->assertResponseStatus(Response::HTTP_OK);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'data' => [ 
                'id',
                'type', 
                'clasification',
                'title',   
            ],
            'code',
            'type'
        ]);

        //validando que no se encuentre registrado en la base de datos
        $this->notSeeInDatabase('theses', $thesis->toArray());

    }
    /**
     * @test 
     * @author Gutierrez Villanueva Katty Susana
     * @testdox Test para eliminar una tesis cuando existe una copia
     * con status igual a Prestado, se debe responder con un mensaje
     * de error
     */
    public function invalid_delete_a_thesis() {
        // Ingresamos registros de tesis
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id, 'status' => 'Prestado']);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        $this->seeInDatabase('theses', $thesis->toArray());
        
        //comprobar codigo de respuesta
        $this->delete(route('deleteThesis', ['id' => $thesis->id]))
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error',
            'code',
            'type'
        ]);

    }

}