<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Devuelve la vista Home con los datos del usuario logueado.
     * La pantalla home.blade.php incluye el uso de un accesor
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(\Auth::user()->id);


        return view('home')->with(compact([
                                            'user'
                                        ]));
    }

    /**
     * Ejemplo de como se llama un mutator
     * @param
     * @return
     */
    public function update()
    {
        User::whereId('id', '!=', 1)->update([ 'last_name' => 'nuevo apellido2' ]);

        // $user = User::find(1);
        // $user->last_name = "prueba tres";
        // $user->update();

        return redirect('/home');
    }
    
}
