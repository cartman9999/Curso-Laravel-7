<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/**
    	 * Create: genera el registro añadiendo por defecto los campos
    	 * created_at y updated_at
    	 * No se debe utilizar en tablas que no incluyan estos dos campos
    	 * De lo contrario marcará un error
    	 */
        User::create([
        				'name' 			=> 'Eric',
        				'second_name' 	=> 'Montes de Oca',
        				'last_name' 	=> 'Juarez',
        				'email' 		=> 'eric.mdoj8@gmail.com',
        				'card_number'	=> '1234567809871234',
        				'birthday' 		=> '1994-02-25 00:00:01',
        				'password' 		=> bcrypt('PasswordEric#2'),
                        'role_id'       => 1
        			]);

        User::create([
                        'name'          => 'Eric',
                        'second_name'   => 'Montes de Oca',
                        'last_name'     => 'Juarez',
                        'email'         => 'eric.mdoj82@gmail.com',
                        'card_number'   => '1234567809871234',
                        'birthday'      => '1994-02-25 00:00:01',
                        'password'      => bcrypt('PasswordEric#2'),
                        'role_id'       => 2
                    ]);

        User::create([
                        'name'          => 'Eric',
                        'second_name'   => 'Montes de Oca',
                        'last_name'     => 'Juarez',
                        'email'         => 'eric.mdoj83@gmail.com',
                        'card_number'   => '1234567809871234',
                        'birthday'      => '1994-02-25 00:00:01',
                        'password'      => bcrypt('PasswordEric#2'),
                        'role_id'       => 3
                    ]);

        User::create([
                        'name'          => 'Eric',
                        'second_name'   => 'Montes de Oca',
                        'last_name'     => 'Juarez',
                        'email'         => 'eric.mdoj84@gmail.com',
                        'card_number'   => '1234567809871234',
                        'birthday'      => '1994-02-25 00:00:01',
                        'password'      => bcrypt('PasswordEric#2'),
                        'role_id'       => 4
                    ]);

        /** 
         * Insert: genera el registro añadiendo sólo los campos especificados
         * es decir, no agrega created_at ni updated_at a menos de que se especifique
         * Utilizarlo en tablas donde no haya estos registros
         */
        User::insert([
        				'name' 			=> 'Eric',
        				'second_name' 	=> 'Montes de Oca',
        				'last_name' 	=> 'Juarez',
        				'email' 		=> 'eric.mdoj28@gmail.com',
        				'card_number'	=> '1234567809871234',
        				'birthday' 		=> '1994-02-25 00:00:01',
        				'password' 		=> bcrypt('PasswordEric#2'),
                        'role_id'       => 1
        			]);
    }
}
