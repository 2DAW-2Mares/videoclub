<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Movie;
use App\User;

class CatalogTest extends TestCase
{
    const CATALOG_PATH = 'catalog';

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class, 1)->create()->first();
    }

// GET|HEAD | /                         |                  | App\Http\Controllers\HomeController@getHome                            | web,auth     |
    public function testHome()
    {
        $response = $this->get('/');
        $response->assertRedirect(action('Auth\LoginController@showLoginForm'));
        $response = $this->actingAs($this->user)->get('/');
        $response->assertRedirect(action('CatalogController@getIndex'));
    }

// GET|HEAD | catalog                   |                  | App\Http\Controllers\CatalogController@getIndex                        | web,auth     |
    public function testCatalogIndex()
    {
        $response = $this->actingAs($this->user)->get(self::CATALOG_PATH);
        $response->assertViewIs('catalog.index');
        $response->assertStatus(200);
        foreach (Movie::all() as $pelicula) {
            $response->assertSeeText($pelicula->title);
        }
    }

// GET|HEAD | catalog/create            |                  | App\Http\Controllers\CatalogController@getCreate                       | web,auth     |
// POST     | catalog/create            |                  | App\Http\Controllers\CatalogController@postCreate                      | web,auth     |
    public function testCatalogPostCreate()
    {
        $response = $this->actingAs($this->user)->post(self::CATALOG_PATH . '/create', array(
            'title' => 'La pelicula',
            'year' => 2019,
            'director' => 'profe',
            'poster' => 'http://noexiste.com',
            'rented' => true,
            'synopsis' => 'Buenisima'
        ));
        $this->assertDatabaseHas('movies', array(
            'title' => 'La pelicula'
        ));
        Movie::destroy(Movie::all()->sortByDesc('id')->first()->id);
    }

// GET|HEAD | catalog/edit/{id}         |                  | App\Http\Controllers\CatalogController@getEdit                         | web,auth     |
// PUT      | catalog/edit              |                  | App\Http\Controllers\CatalogController@putEdit                         | web,auth     |
    public function testCatalogPutEdit()
    {
        $idRand = rand(1, Movie::count() - 1);
        $pelicula = Movie::find($idRand);
        $response = $this->actingAs($this->user)->put(self::CATALOG_PATH . '/edit', array(
            'id' => $pelicula->id,
            'title' => 'Otra pelicula',
            'year' => 2019,
            'director' => 'Yo mismo',
            'poster' => 'http://noexiste.com',
            'synopsis' => 'El argumento',
        ));
        $this->assertDatabaseHas('movies', array(
            'title' => 'Otra pelicula'
        ));
        $pelicula->save();
    }
// GET|HEAD | catalog/show/{id}         |                  | App\Http\Controllers\CatalogController@getShow                         | web,auth     |
    public function testCatalogShow()
    {
        foreach (Movie::all() as $pelicula) {
            $response = $this->actingAs($this->user)->get(self::CATALOG_PATH . '/show/' . $pelicula->id);
            $response->assertViewIs('catalog.show');
            $response->assertStatus(200);
            $texto1 = $pelicula->rented ? 'alquilada' : 'disponible';
            $texto2 = $pelicula->rented ? 'Devolver' : 'Alquilar';
            $response->assertSeeText($texto1);
            $response->assertSeeText($texto2);
        }
    }

    // POST     | login                     |                  | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
    public function testPostLogin()
    {
        $response = $this->post('/login',['email' => $this->user->email, 'password' => $this->user->password]);
        $response->assertRedirect(action('HomeController@getHome'));
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
            $response = $this->actingAs($this->user)->get(self::CATALOG_PATH . $request['path']);
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
        $response = $this->actingAs($this->user)->get(self::CATALOG_PATH . '/edit/e');
        $response->assertStatus(404);
    }

}
