<?php

use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;

class UpdateThesisTest extends TestCase
{
    /*
     *Trait to callback the BD
    */
    use DatabaseMigrations;
        
    /**************************************************
     *             UPDATE A THESIS
     **************************************************/

    /**
     * @test 
     * @author Gutierrez Villanueva Katty Susana
     * @testdox Test para validar la actualización de informacion
     * de una tesis mediante una peticion de tipo put
     */

    public function valid_update_of_thesis() {
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'type' => 1,
            'clasification' => '102',
            'title' => 'Sistema de pronostico de la demanda de productos farmaceuticos',
            'year' => '2005',
            'school_id' => 1,
            'stand_id' => 1,
            'adviser' => 'Ada Garcia',
            'extension' => '200',
            'observations' => 'Eum qui dolor quo vero ab vitae delectus.',
            'accompaniment' => 'Modi iste molestiae assumenda odio.',
            'content' => 'Sint omnis atque quia id ut placeat.',
            'summary' => 'Laborum non illum saepe.',
            'recomendations' => 'Vel voluptatem at culpa sint.',
            'conclusions' => 'Eum qui dolor quo vero ab vitae delectus.',
            'bibliography' => 'Aliquid ea aliquam rem aut eum.',
            'keywords' => 'Earum velit officia nihil.',
            'mention' => 'titulo',
            'authors' => [['author_id' => 3], ['author_id' => 4]]
        ];
        
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_CREATED);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'data' =>[  
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
            ],
            'code',
            'type'
        ]);

    }
    /**
     * @test 
     * @author Gutierrez Villanueva Katty Susana
     * @testdox Test para validar la actualización de informacion
     * de una tesis mediante una peticion de tipo patch
     */

    public function valid_update_of_thesis_patch() {
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'type' => 1,
            'clasification' => '102',
            'title' => 'Sistema de pronostico de la demanda de productos farmaceuticos',
            'year' => '2005',
            'school_id' => 1,
            'stand_id' => 1,
            'adviser' => 'Ada Garcia',
            'extension' => '200',
            'observations' => 'Eum qui dolor quo vero ab vitae delectus.',
            'accompaniment' => 'Modi iste molestiae assumenda odio.',
            'content' => 'Sint omnis atque quia id ut placeat.',
            'summary' => 'Laborum non illum saepe.',
            'recomendations' => 'Vel voluptatem at culpa sint.',
            'conclusions' => 'Eum qui dolor quo vero ab vitae delectus.',
            'bibliography' => 'Aliquid ea aliquam rem aut eum.',
            'keywords' => 'Earum velit officia nihil.',
            'mention' => 'titulo',
            'authors' => [['author_id' => 3], ['author_id' => 4]]
        ];
        
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_CREATED);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'data' =>[  
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
            ],
            'code',
            'type'
        ]);

    }
    /**
     * @test 
     * @author Gutierrez Villanueva Katty Susana
     * @testdox Test para actualizar la informacion de una tesis cuando no hay 
     * cambios en la nueva información, mediante una peticion de tipo put
     */

    public function invalid_update_of_thesis_without_changes() {
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'type' => $thesis->type,
            'clasification' => $thesis->clasification,
            'title' => $thesis->title,
            'year' => $thesis->year,
            'school_id' => $thesis->school_id,
            'stand_id' => $thesis->stand_id,
            'adviser' => $thesis->adviser,
            'extension' => $thesis->extension,
            'observations' => $thesis->observations,
            'accompaniment' => $thesis->accompaniment,
            'content' => $thesis->content,
            'summary' => $thesis->summary,
            'recomendations' => $thesis->recomendations,
            'conclusions' => $thesis->conclusions,
            'bibliography' => $thesis->bibliography,
            'keywords' => $thesis->keywords,
            'mention' => $thesis->mention,
            'authors' => [['author_id' => 2], ['author_id' => 1]]
        ];
        
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error',
            'code',
            'type'
        ]);

    }
    /**
     * @test 
     * @author Gutierrez Villanueva Katty Susana
     * @testdox Test para actualizar la informacion de una tesis cuando no hay 
     * cambios en la nueva información, mediante una peticion de tipo patch
     */

    public function invalid_update_of_thesis_without_changes_patch() {
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'type' => $thesis->type,
            'clasification' => $thesis->clasification,
            'title' => $thesis->title,
            'year' => $thesis->year,
            'school_id' => $thesis->school_id,
            'stand_id' => $thesis->stand_id,
            'adviser' => $thesis->adviser,
            'extension' => $thesis->extension,
            'observations' => $thesis->observations,
            'accompaniment' => $thesis->accompaniment,
            'content' => $thesis->content,
            'summary' => $thesis->summary,
            'recomendations' => $thesis->recomendations,
            'conclusions' => $thesis->conclusions,
            'bibliography' => $thesis->bibliography,
            'keywords' => $thesis->keywords,
            'mention' => $thesis->mention,
            'authors' => [['author_id' => 2], ['author_id' => 1]]
        ];
        
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error',
            'code',
            'type'
        ]);

    }
    
    /**************************************************
    *             TYPE OF FIELDS
    **************************************************/

    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo type con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_type(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'type' => 'ab',
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'type'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo type con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_type_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'type' => 'ab',
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'type'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo clasification con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_clasification(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'clasification' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'clasification'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo clasification con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_clasification_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'clasification' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'clasification'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo title con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_title(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'title' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'title'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo title con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_title_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'title' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'title'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo year con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_year(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'year' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'year'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo year con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_year_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'year' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'year'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo school_id con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_school_id(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'school_id' => 'ab'
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'school_id'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo school_id con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_school_id_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'school_id' => 'ab'
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'school_id'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo stand_id con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_stand_id(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'stand_id' => 'ab'
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'stand_id'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo stand_id con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_stand_id_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'stand_id' => 'ab'
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'stand_id'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo adviser con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_adviser(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'adviser' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'adviser'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo adviser con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_adviser_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'adviser' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'adviser'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo extension con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_extension(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'extension' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'extension'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo extension con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_extension_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'extension' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'extension'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo observations con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_observations(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'observations' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'observations'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo observations con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_observations_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'observations' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'observations'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo accompaniment con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_accompaniment(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'accompaniment' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'accompaniment'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo accompaniment con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_accompaniment_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'accompaniment' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'accompaniment'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo content con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_content(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'content' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'content'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo content con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_content_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'content' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'content'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo summary con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_summary(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'summary' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'summary'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo summary con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_summary_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'summary' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'summary'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo recomendations con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_recomendations(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'recomendations' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'recomendations'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo recomendations con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_recomendations_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'recomendations' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'recomendations'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo conclusions con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_conclusions(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'conclusions' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'conclusions'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo conclusions con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_conclusions_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'conclusions' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'conclusions'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo bibliography con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_bibliography(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'bibliography' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'bibliography'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo bibliography con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_bibliography_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'bibliography' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'bibliography'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo keywords con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_keywords(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'keywords' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'keywords'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo keywords con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_keywords_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'keywords' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'keywords'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo mention con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_mention(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'mention' => 123
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'mention'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo mention con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_mention_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'mention' => 123
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'mention'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo author_id con un dato de otro tipo, 
    * mediante una peticion de tipo put
    */
    public function invalid_update_of_thesis_with_incorrect_author_id(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'authors' => [['author_id' => 'ab']]
        ];
        //comprobar codigo de respuesta
        $this->put(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error',
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para actualizar la informacion de una tesis 
    * cuando se envía el campo author_id con un dato de otro tipo, 
    * mediante una peticion de tipo patch
    */
    public function invalid_update_of_thesis_with_incorrect_author_id_patch(){
        // Creamos data valida
        $thesis=factory('App\Models\Thesis')->create();
        factory('App\Models\ThesisCopy',2)->create(['thesis_id' => $thesis->id]);
        DB::table('thesis_authors')->insert([
            ['thesis_id' => $thesis->id, 'author_id' => 1],
            ['thesis_id' => $thesis->id, 'author_id' => 2]
        ]);
        
        $data = [
            'authors' => [['author_id' => 'ab']]
        ];
        //comprobar codigo de respuesta
        $this->patch(route('updateThesis', ['id' => $thesis->id]), $data)
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error',
            'code',
            'type'
        ]);
    }

}