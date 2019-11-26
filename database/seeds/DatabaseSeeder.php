<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        self::seedCatalog();
        $this->command->info('Tabla catálogo inicializada con datos!');
    }

    public function seedCatalog(){

    }

}
