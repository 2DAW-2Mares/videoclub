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
        self::seedCatalog();
        $this->command->info('Tabla catálogo inicializada con datos!');

        // $this->call(UsersTableSeeder::class);
    }
}
