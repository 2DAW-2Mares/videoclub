<?php

use Illuminate\Database\Seeder;
use App\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

  

    public function run()
    {


      self::seedCatalog();
      $this->command->info('Tabla catálogo inicializada con datos!');
    }
    private function seedCatalog(){
      Movie::truncate();
      foreach( self::$arrayPeliculas as $pelicula ) {
        $p = new Movie;
        $p->title = $pelicula['title'];
        $p->year = $pelicula['year'];
        $p->director = $pelicula['director'];
        $p->poster = $pelicula['poster'];
        $p->rented = $pelicula['rented'];
        $p->synopsis = $pelicula['synopsis'];
        $p->save();
      }
    }
}
