<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $basePath = 'catalog';
        $idRand = rand(1,10);
        $requests = array(
            array(
                'path' => '/',
                'text' => 'Listado películas'
            ),
            array(
                'path' => '/show/' . $idRand,
                'text' => 'Vista detalle película ' . $idRand
            ),
            array(
                'path' => '/create',
                'text' => 'Añadir película'
            ),
            array(
                'path' => '/edit/' . $idRand,
                'text' => 'Modificar película ' . $idRand
            ),
        );

        foreach ($requests as $request) {
            $response = $this->get($basePath . $request['path']);

            $response->assertStatus(200);
            $response->assertSeeText($request['text']);
        }

        // Controlar que el id sea numérico
        $response = $this->get($basePath . '/edit/e');

        $response->assertStatus(404);

    }
}
