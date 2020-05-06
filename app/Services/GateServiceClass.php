<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class GateServiceClass
{
    static private $valid_day = "Miercoles";

    public function __construct() {

    }   

    /**
     *
     * @param
     * @return
     */
    public function gatesValidation($user, $current_day)
    {
        $day = self::$valid_day;

        if (Gate::denies('premium', $user)) {
            return [
                        'success'   => false,
                        'error'     => "No eres usuario premium"
                    ];
        }

        if (Gate::denies('day', [$current_day, $day])) {
            return [
                        'success'   => false,
                        'error'     => "La promoción sólo es valida los " . self::$valid_day
                    ];
        }

        return [ "success" => true ];
    }
}