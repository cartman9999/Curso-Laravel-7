<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'second_name', 'last_name', 'email', 'card_number', 'birthday', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'card_number', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    /**
     * Accesors
     * Sirven para alterar la manera en que se despliegan los datos
     * sintaxis para declararlos: getNombreDeMiAccesorAttribute
     * sintaxis para utilizar: $modelo->nombreDeMiAccesor
     */
    public function getFullNameAttribute() {
        return "{$this->name} {$this->second_name} {$this->last_name}";
    }

    /**
    * Mutators
    * Sirven para alterar la manera en la que se guarda un registro
    * en una columna de la tabla en especifico
    * sintaxis para declararlos: setNombreDeMiMutatorAtrribute
    * 
    * Dentro de la función se agrega el nombre de la columna que queremos afectar
    * Nota: el modelo por si llamada al mutator, no hay que hacer nada más
    */
    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = strtoupper($value);
    }
}
