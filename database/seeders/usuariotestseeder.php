<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\hash;
use App\Models\User;

class usuariotestseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Definir 1er usuario de prueba
        User::Create([
            'name' => 'Juana',
            'email' => 'juana@gmail.com',
            'password' => Hash::make('Juana123'),
        ]);
        //Definir 2do usuario de prueba
        User::Create([
            'name' => 'Byron',
            'email' => 'Byron@gmail.com',
            'password' => Hash::make('Byron123'),
        ]);
    }
}
