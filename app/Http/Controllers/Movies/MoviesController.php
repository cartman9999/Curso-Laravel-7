<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
// use App\Http\Middleware\VerifyAge;
use Illuminate\Http\Request;


/**
 * Clase 3 Middleware
 * Los Middlewares son una secuancia que se ejecuta dentro de Laravel
 * antes de llegar al request, por lo tanto podemos usarlos como un filtro
 * para definir un middleware desde terminal:
 * php artisan make:middleware NombreDelMiddleware.php
 * 
 * Este Middleware se aloja en la carpeta app/Http/Middleware
 * para el ejemplo se creó el Middleware VerifyAge.php
 */
class MoviesController extends Controller
{
    public function __construct() 
    {
    }

    /**
     *
     * @param
     * @return
     */
    public function index()
    {
    	return view('middleware.movies.index');
    }
    
    /**
     *
     * @param
     * @return
     */
    public function showComedyMovies()
    {
        return "Peliculas de Comedia";
    }
    
    /**
     *
     * @param
     * @return
     */
    public function showAdultMovies()
    {
    	return 'Peliculas para adultos';
    }
    
}
