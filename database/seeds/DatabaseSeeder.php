<?php

use App\Models\Thesis;
use App\Models\ThesisCopy;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Thesis::class,40)->create();
        factory(ThesisCopy::class,70)->create();
        $this->call('AuthorsTableSeeder');
    }
}
