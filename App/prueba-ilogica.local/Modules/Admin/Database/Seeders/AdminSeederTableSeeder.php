<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AdminSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        Model::unguard();

        $usuarios = [
            [
                'correo' => 'admin@admin.cl',
                'name' => 'Admin',
            ]
        ];

        foreach( $usuarios as $key => $usuario){
            $password = bcrypt('12345678');
            User::insert([
                'name'    => $usuario['name'],
                'email'    => $usuario['correo'],
                'password'  => $password
            ]);
        }
    
    }
}
