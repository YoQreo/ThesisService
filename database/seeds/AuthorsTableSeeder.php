<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thesis_authors')->insert(
            [
                ['thesis_id' => 1, 'author_id' => 1, 'type' => 'principal'],
                ['thesis_id' => 1, 'author_id' => 3, 'type' => 'secundario'],
                ['thesis_id' => 2, 'author_id' => 2, 'type' => 'principal'],
                ['thesis_id' => 3, 'author_id' => 3, 'type' => 'principal'],
                ['thesis_id' => 4, 'author_id' => 4, 'type' => 'principal'],
                ['thesis_id' => 5, 'author_id' => 5, 'type' => 'principal'],
                ['thesis_id' => 6, 'author_id' => 6, 'type' => 'principal'],
                ['thesis_id' => 6, 'author_id' => 9, 'type' => 'secundario'],
                ['thesis_id' => 7, 'author_id' => 7, 'type' => 'principal'],
                ['thesis_id' => 8, 'author_id' => 8, 'type' => 'principal'],
                ['thesis_id' => 9, 'author_id' => 9, 'type' => 'principal'],
                ['thesis_id' => 9, 'author_id' => 15, 'type' => 'secundario'],
                ['thesis_id' => 10, 'author_id' => 10, 'type' => 'principal'],
                ['thesis_id' => 11, 'author_id' => 11, 'type' => 'principal'],
                ['thesis_id' => 12, 'author_id' => 12, 'type' => 'principal'],
                ['thesis_id' => 13, 'author_id' => 13, 'type' => 'principal'],
                ['thesis_id' => 14, 'author_id' => 14, 'type' => 'principal'],
                ['thesis_id' => 15, 'author_id' => 15, 'type' => 'principal'],
                ['thesis_id' => 16, 'author_id' => 16, 'type' => 'principal'],
                ['thesis_id' => 17, 'author_id' => 17, 'type' => 'principal'],
                ['thesis_id' => 18, 'author_id' => 18, 'type' => 'principal'],
                ['thesis_id' => 19, 'author_id' => 19, 'type' => 'principal'],
                ['thesis_id' => 20, 'author_id' => 20, 'type' => 'principal'],
                ['thesis_id' => 21, 'author_id' => 1, 'type' => 'principal'],
                ['thesis_id' => 22, 'author_id' => 2, 'type' => 'principal'],
                ['thesis_id' => 23, 'author_id' => 3, 'type' => 'principal'],
                ['thesis_id' => 24, 'author_id' => 4, 'type' => 'principal'],
                ['thesis_id' => 25, 'author_id' => 5, 'type' => 'principal'],
                ['thesis_id' => 26, 'author_id' => 6, 'type' => 'principal'],
                ['thesis_id' => 27, 'author_id' => 7, 'type' => 'principal'],
                ['thesis_id' => 28, 'author_id' => 8, 'type' => 'principal'],
                ['thesis_id' => 29, 'author_id' => 9, 'type' => 'principal'],
                ['thesis_id' => 29, 'author_id' => 18, 'type' => 'secundario'],
                ['thesis_id' => 30, 'author_id' => 10, 'type' => 'principal'],
                ['thesis_id' => 31, 'author_id' => 11, 'type' => 'principal'],
                ['thesis_id' => 32, 'author_id' => 12, 'type' => 'principal'],
                ['thesis_id' => 33, 'author_id' => 13, 'type' => 'principal'],
                ['thesis_id' => 34, 'author_id' => 14, 'type' => 'principal'],
                ['thesis_id' => 35, 'author_id' => 15, 'type' => 'principal'],
                ['thesis_id' => 36, 'author_id' => 16, 'type' => 'principal'],
                ['thesis_id' => 36, 'author_id' => 5, 'type' => 'secundario'],
                ['thesis_id' => 37, 'author_id' => 17, 'type' => 'principal'],
                ['thesis_id' => 38, 'author_id' => 18, 'type' => 'principal'],
                ['thesis_id' => 39, 'author_id' => 19, 'type' => 'principal'],
                ['thesis_id' => 40, 'author_id' => 20, 'type' => 'principal'],
            ]
        );
        
    }
}
