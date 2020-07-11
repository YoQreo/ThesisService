<?php

use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;

class GetAllThesisTest extends TestCase
{
    /*
     *Trait to callback the BD
    */
    use DatabaseMigrations;
        
    /**************************************************
     *             GET ALL THESIS
     **************************************************/

    /**
     * @test 
     * @author Gutierrez Villanueva Katty Susana
     * @testdox Test para mostrar todos las tesis obtenidas
     * mediante una ruta de nombre showAllThesis
     */

    public function valid_show_all_thesis() {
        // Ingresamos registros de tesis
        $thesis1=factory('App\Models\Thesis')->create();
        $thesis2=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis1->id]);
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis2->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis1->id, 'author_id' => 1],
            ['thesis_id' => $thesis2->id, 'author_id' => 2]
        ]);
        //comprobar codigo de respuesta
        $this->get(route('showAllThesis'))
        ->assertResponseStatus(Response::HTTP_OK);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'data' => [  
                '*' => [
                    'id',
                    'type', 
                    'clasification',
                    'title',
                    'year',
                    'school_id',
                    'stand_id',
                    'adviser',
                    'extension',
                    'observations',
                    'accompaniment',
                    'content',
                    'summary',
                    'recomendations',
                    'conclusions',
                    'bibliography',
                    'keywords',
                    'mention',
                    'created_at',
                    'updated_at',
                    'authors'
                ]
            ],
            'code',
            'type'
        ]);

    }
    

}