<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExampleVationRequest;
use Validator;

/**
 * Controlador realizado para ejemplificar el uso de 
 * los Form Request de Laravel
 * 
 * Pasos para crear un Form Request:
 *
 * 1) En terminal ejecutar:
 * 		php artisan make:request NombreDelArchivoRequest
 * No es obligatorio pero es una buena práctica por el nombre 
 * que queramos y terminar con la palabara Request
 * 
 * 2) Indicar al Controlador que queremos ocupar ese 
 * archivo con la sentencia:
 * 		use App\Http\Request\NombreDelArchivoRequest;
 * 
 * 3) Hace inyección de dependencias dentro de la 
 * función que queramos validar
 * 
 * 4) Dentro del Form Request modificar el valor de la función
 * authorize() a true para que las validaciones se puedan ejecutar.
 *
 * 5) Definir las reglas de validación dentro de la función rules()
 *
 * 6) Modificar el archivo según lo requerido.
 */
class RequestValidationController extends Controller
{
	/**
     * Función encargada de obtener los 
     * errores devueltos por el Form Request
     * @return 
     */
    public function getErrors()
    {
    	// Obtener los errores desde la Sesión
        $errors = \Session::get('errors');
        $errors = json_decode($errors);

        // Generar un arreglo con los errores
        $result             = [];
        $result['success']  = false;
        foreach ($errors as $error) {
            $result['errors'][] = $error;
        }

        return $result;
    }

	/**
	 * Función llamada por el $redirectAction 
	 * del Form Request
	 */
	public function validatorFailure()
	{
		// Llamado a la funcion getErrors
		return $this->getErrors();
	}
	

    /**
     * Ejemplo de uso de Form Request
     * @param ExampleVationRequest $request
     * @return
     */
    public function primerEjemplo(ExampleVationRequest $request)
    {
    	// 1) Se ejecuta el Form Request ExampleVationRequest

    	// 2) Si la respuesta es erronea se ejecutará la acción que nosotros hayamos definido en el Form Request, en caso de no haber definido alguna el comportamiento por defecto de los Form Request regresa a la página anterior con los errores almacenados en la Sesión.

    	// 3) Si la validación fue exitosa, contínua el flujo de la función
        return 'Correcto';	
    }
}
