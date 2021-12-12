<?php

use Illuminate\Database\Seeder;
use App\Salones;
use App\Materias;
use App\Estudiantes;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
                          factory(Salones::class,10)->create();
                          factory(Materias::class,10)->create();
                          factory(Estudiantes::class,10)->create();

    }
}
