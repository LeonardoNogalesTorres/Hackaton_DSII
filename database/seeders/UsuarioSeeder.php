<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Crear el usuario con rol de Operador
        User::create([
            'name' => 'Juan Operador',
            'email' => 'operador@upds.net',
            'password' => Hash::make('password123'),
            'rol' => 'Operador' // Asegúrate de tener este campo o manejarlo en texto plano para el MVP
        ]);

        // Crear el usuario con rol de Coordinador
        User::create([
            'name' => 'Ana Coordinadora',
            'email' => 'coordinador@upds.net',
            'password' => Hash::make('password123'),
            'rol' => 'Coordinador'
        ]);
    }
}