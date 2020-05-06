<?php

namespace App\Http\Controllers;

use App\User;
use App\Services\GateServiceClass;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use stdClass;

class GuardController extends Controller
{
	protected $gateService;

    public function __construct(GateServiceClass $gate)
    {
    	$this->middleware('auth');

    	$this->gateService = $gate;
    }
    
    /**
     * Uso de Gates
     */
    public function getPromotion()
    {
    	$user 			=  \Auth::user();
    	$current_day 	= $this->getDay();
    	// $day 			= self::$valid_day; 

    	// 1) Filtros
    	$gates = $this->gateService->gatesValidation($user, $current_day);

    	if ($gates['success'] == false) {
    		return $gates['error'];
    	}

		return 'Ahora tienes 50% de descuento en todos los productos por una hora.';
    }

    /**
     *
     * @param
     * @return
     */
    public function indexPremium()
    {
    	// return "Estas en la seccion para usuarios premium.";

    	$user = User::find(\Auth::id());

    	// dd($user);

    	if ($user->can('view', $user)) {
    		return "Estas en la seccion para usuarios premium.";
    	  } else {
    	    return  'Not Authorized.';
    	  }
    }
    

    /**
     * Original
     * @param
     * @return
     */
    public function getPromotion1()
    {
		if (\Auth::user()->role_id == 1) {
		  	if ($this->getDay() == self::$valid_day) {
				return 'Ahora tienes 50% de descuento en todos los productos por una hora.';
		  	} else {
		  		return "La promoción sólo es valida los " . self::$valid_day;
		  	}
		}  	else {
			return 'No eres usuario premium.';
		}
    }

    /**
     * V2
     */
    public function getPromotion2()
    {
		if (\Auth::user()->role_id == 1) {
		  	if ($this->getDay() != self::$valid_day) {
		  		return "La promoción sólo es valida los " . self::$valid_day;
		  	} 
				return 'Ahora tienes 50% de descuento en todos los productos por una hora.';
		}  	else {
			return 'No eres usuario premium.';
		}
    }

    /**
     * V3
     */
    public function getPromotio3()
    {
		if (\Auth::user()->role_id != 1) {
			return 'No eres usuario premium.';
		}  	

	  	if ($this->getDay() != self::$valid_day) {
	  		return "La promoción sólo es valida los " . self::$valid_day;
	  	} 

		return 'Ahora tienes 50% de descuento en todos los productos por una hora.';
    }

    /**
     *
     * @param
     * @return
     */
    public function roleGuard($user)
    {
    	return $user->role_id == 1;
    }
    

    /**
     *
     * @param
     * @return
     */
    public function getDay()
    {
    	$week_map = [
    	    0 => 'Domingo',
    	    1 => 'Lunes',
    	    2 => 'Martes',
    	    3 => 'Miercoles',
    	    4 => 'Jueves',
    	    5 => 'Viernes',
    	    6 => 'Sabado',
    	];
    	
    	$day_of_the_week = Carbon::now()->dayOfWeek;
    	return $week_map[$day_of_the_week];
    }
    
}
