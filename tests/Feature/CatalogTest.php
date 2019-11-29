<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Movie;

class CatalogTest extends TestCase
{
    const CATALOG_PATH = 'catalog';

    public function testHome()
    {
        $response = $this->get('/');
        $response->assertRedirect(action('CatalogController@getIndex'));
    }

    public function testCatalogShow()
    {
        foreach (Movie::all() as $pelicula) {
            $response = $this->get(self::CATALOG_PATH . '/show/' . $pelicula->id);
            $response->assertViewIs('catalog.show');
            $response->assertStatus(200);
            $texto1 = $pelicula->rented ? 'alquilada' : 'disponible';
            $texto2 = $pelicula->rented ? 'Devolver' : 'Alquilar';
            $response->assertSeeText($texto1);
            $response->assertSeeText($texto2);
        }
    }

    public function testCatalogViews()
    {
        $arrayPeliculas = Movie::all();
        $idRand = rand(1,count($arrayPeliculas) - 1);
        $textosPeliculas = array();

        foreach ($arrayPeliculas as $pelicula) {
            array_push($textosPeliculas, $pelicula->title);
        }

        $requestsCatalog = array(
            array(
                'path' => '/',
                'view' => 'catalog.index',
                'texts' => $textosPeliculas
            ),
            array(
                'path' => '/create',
                'view' => 'catalog.create',
                'texts' => array(
                    'Añadir película',
                    'Resumen'
                )
            ),
            array(
                'path' => '/edit/' . $idRand,
                'view' => 'catalog.edit',
                'texts' => array(
                    'Modificar película',
                    'Título',
                    'Resumen'
                )
            ),
        );

        foreach ($requestsCatalog as $request) {
            $response = $this->get(self::CATALOG_PATH . $request['path']);
            $response->assertSuccessful();
            $response->assertViewIs($request['view']);
            foreach ($request['texts'] as $text) {
                $response->assertSeeText($text);
            }
        }

    }

    public function testEdit404()
    {
        // Controlar que el id sea numérico
        $response = $this->get(self::CATALOG_PATH . '/edit/e');
        $response->assertStatus(404);
    }

}
