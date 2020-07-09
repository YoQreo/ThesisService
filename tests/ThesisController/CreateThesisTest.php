<?php

use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;

class CreateThesisTest extends TestCase
{
    /*
     *Trait to callback the BD
    */
    use DatabaseMigrations;
        
    /**************************************************
     *             CREATE THESIS
     **************************************************/

    /**
     * @test 
     * @author Gutierrez Villanueva Katty Susana
     * @testdox Test para validar la creación de tesis
     */

    public function valid_creation_of_a_thesis() {
        // Creamos data valida
        $thesis = factory('App\Models\Thesis')->make();
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray(),)
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
                'editorial_id',
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
                'authors',
                'copies'
            ],
            'code',
            'type'
        ]);

    }
    /**************************************************
    *                 FIELDS NULL
    **************************************************/
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para la creación de tesis cuando se envía el campo type
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_type(){
        // Creamos una tesis con el campo type vacío
        $thesis = factory('App\Models\Thesis')->make(['type' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo clasification
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_clasification(){
        // Creamos una tesis con el campo clasification vacío
        $thesis = factory('App\Models\Thesis')->make(['clasification' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo title
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_title(){
        // Creamos una tesis con el campo title vacío
        $thesis = factory('App\Models\Thesis')->make(['title' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo year
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_year(){
        // Creamos una tesis con el campo year vacío
        $thesis = factory('App\Models\Thesis')->make(['year' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo extension
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_extension(){
        // Creamos una tesis con el campo extension vacío
        $thesis = factory('App\Models\Thesis')->make(['extension' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo observations
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_observations(){
        // Creamos una tesis con el campo observations vacío
        $thesis = factory('App\Models\Thesis')->make(['observations' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo accompaniment
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_accompaniment(){
        // Creamos una tesis con el campo accompaniment vacío
        $thesis = factory('App\Models\Thesis')->make(['accompaniment' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo content
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_content(){
        // Creamos una tesis con el campo content vacío
        $thesis = factory('App\Models\Thesis')->make(['content' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo summary
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_summary(){
        // Creamos una tesis con el campo summary vacío
        $thesis = factory('App\Models\Thesis')->make(['summary' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo mention
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_mention(){
        // Creamos una tesis con el campo mention vacío
        $thesis = factory('App\Models\Thesis')->make(['mention' => NULL]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo authors
    * vacío, se debe responder con un mensaje de error
    */
    public function invalid_create_thesis_with_empty_authors(){
        // Creamos una tesis con el campo authors vacío
        $thesis = factory('App\Models\Thesis')->make();
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'authors'
            ],
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
    * @testdox Test para la creación de tesis cuando se envía el campo type 
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_type(){
        // Creamos una tesis con tipo invalido en type
        $thesis = factory('App\Models\Thesis')->make(['type' => 'ab']);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo clasification 
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_clasification(){
        // Creamos una tesis con tipo invalido en clasification
        $thesis = factory('App\Models\Thesis')->make(['clasification' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo title 
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_title(){
        // Creamos una tesis con tipo invalido en title
        $thesis = factory('App\Models\Thesis')->make(['title' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo year
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_year(){
        // Creamos una tesis con tipo invalido en year
        $thesis = factory('App\Models\Thesis')->make(['year' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo school_id 
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_school_id(){
        // Creamos una tesis con tipo invalido en school_id
        $thesis = factory('App\Models\Thesis')->make(['school_id' => 'ab']);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo editorial_id
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_editorial_id(){
        // Creamos una tesis con tipo invalido en editorial_id
        $thesis = factory('App\Models\Thesis')->make(['editorial_id' => 'ab']);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error' =>[
                'editorial_id'
            ],
            'code',
            'type'
        ]);
    }
    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para la creación de tesis cuando se envía el campo stand_id
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_stand_id(){
        // Creamos una tesis con tipo invalido en stand_id
        $thesis = factory('App\Models\Thesis')->make(['stand_id' => 'ab']);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo adviser
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_adviser(){
        // Creamos una tesis con tipo invalido en adviser
        $thesis = factory('App\Models\Thesis')->make(['adviser' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo extension
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_extension(){
        // Creamos una tesis con tipo invalido en extension
        $thesis = factory('App\Models\Thesis')->make(['extension' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo observations
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_observations(){
        // Creamos una tesis con tipo invalido en observations
        $thesis = factory('App\Models\Thesis')->make(['observations' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo accompaniment
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_accompaniment(){
        // Creamos una tesis con tipo invalido en accompaniment
        $thesis = factory('App\Models\Thesis')->make(['accompaniment' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo content
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_content(){
        // Creamos una tesis con tipo invalido en content
        $thesis = factory('App\Models\Thesis')->make(['content' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo summary
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_summary(){
        // Creamos una tesis con tipo invalido en summary
        $thesis = factory('App\Models\Thesis')->make(['summary' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo recomendations
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_recomendations(){
        // Creamos una tesis con tipo invalido en recomendations
        $thesis = factory('App\Models\Thesis')->make(['recomendations' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo conclusions
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_conclusions(){
        // Creamos una tesis con tipo invalido en conclusions
        $thesis = factory('App\Models\Thesis')->make(['conclusions' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo bibliography
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_bibliography(){
        // Creamos una tesis con tipo invalido en bibliography
        $thesis = factory('App\Models\Thesis')->make(['bibliography' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo keywords
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_keywords(){
        // Creamos una tesis con tipo invalido en keywords
        $thesis = factory('App\Models\Thesis')->make(['keywords' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo mention
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_mention(){
        // Creamos una tesis con tipo invalido en mention
        $thesis = factory('App\Models\Thesis')->make(['mention' => 123]);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo author_id
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_author_id(){
        // Creamos una tesis con tipo invalido en author_id
        $thesis = factory('App\Models\Thesis')->make();
        $author = [['author_id'=> 'abc','type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo author_type
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_author_type(){
        // Creamos una tesis con tipo invalido en author_type
        $thesis = factory('App\Models\Thesis')->make();
        $author = [['author_id'=> 1,'type'=> 123]];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo incomeNumber
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_income_number(){
        // Creamos una tesis con tipo invalido en incomeNumber
        $thesis = factory('App\Models\Thesis')->make();
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => 123,'barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo barcode
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_barcode(){
        // Creamos una tesis con tipo invalido en barcode
        $thesis = factory('App\Models\Thesis')->make();
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => 123,'copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo copy
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_copy(){
        // Creamos una tesis con tipo invalido en copy
        $thesis = factory('App\Models\Thesis')->make();
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 'ab', 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo status
    * con un dato de otro tipo
    */
    public function invalid_create_of_thesis_with_incorrect_status(){
        // Creamos una tesis con tipo invalido en status
        $thesis = factory('App\Models\Thesis')->make();
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 123]];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error',
            'code',
            'type'
        ]);
    }
    /**************************************************
    *             VALUE OF FIELDS
    **************************************************/

    /**
    * @test 
    * @author Gutierrez Villanueva Katty Susana
    * @testdox Test para la creación de tesis cuando se envía el campo mention
    * con un valor diferente a bachiller, titulo, maestria, doctorado
    */
    public function invalid_create_of_thesis_with_value_incorrect_in_mention(){
        // Creamos una tesis con un valor inválido en mention
        $thesis = factory('App\Models\Thesis')->make(['mention' => 'abc']);
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo author_type
    * con un valor diferente a principal, secundario
    */
    public function invalid_create_of_thesis_with_value_incorrect_in_author_type(){
        // Creamos una tesis con un valor inválido en author_type
        $thesis = factory('App\Models\Thesis')->make();
        $author = [['author_id'=> 1,'type'=> 'abc']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'Prestado']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
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
    * @testdox Test para la creación de tesis cuando se envía el campo copy_status
    * con un valor diferente a Prestado, En Espera, Deshabilitado, Disponible'
    */
    public function invalid_create_of_thesis_with_value_incorrect_in_copy_status(){
        // Creamos una tesis con un valor inválido en copy_status
        $thesis = factory('App\Models\Thesis')->make();
        $author = [['author_id'=> 1,'type'=> 'principal']];
        $thesis['authors'] = $author;
        $copy = [['incomeNumber' => '1','barcode' => '123','copy' => 1, 'status' => 'abc']];
        $thesis['copies'] = $copy;
        //comprobar codigo de respuesta
        $this->post(route('createThesis'),$thesis->toArray())
        ->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        //comprobar estructura de respuesta
        $this->seeJsonStructure([
            'error',
            'code',
            'type'
        ]);
    }

}