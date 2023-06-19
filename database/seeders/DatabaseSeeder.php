<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            ['id' => 1, 'nombre' => 'Estefania', 'apellidos' => 'Muñoz Calzado', 'dni' => '12345678L', 'email'=> 'estefania@gmail.com', 'password' => '123456', 'direccion' => 'C/Ancha Nº 12', 'rol' => 'admin'],
            ['id' => 2, 'nombre' => 'Jesús', 'apellidos' => 'Morales Cañete', 'dni' => '12378934A', 'email'=> 'jesus@gmail.com', 'password' => '123456', 'direccion' => 'C/Ancha Nº 22', 'rol' => 'user'],

        ]);

        DB::table('categorias')->insert([
            ['id' => 1, 'nombre' => 'partes superiores', 'descripcion' => 'Parte superior del cuerpo(camisetas, blusas, chaquetas)'],
            ['id' => 2, 'nombre' => 'partes inferiores', 'descripcion' => 'Parte inferior del cuerpo(pantalones, faldas)'],
            ['id' => 3, 'nombre' => 'partes completas', 'descripcion' => 'Cuerpo entero (monos, vestidos, trajes)'],
            ['id' => 4, 'nombre' => 'calzado', 'descripcion' => 'Calzado (zapatillas, zapatos, sandalias)'],
        ]);

        DB::table('descuentos')->insert([
            ['id' => 1, 'porcentaje' => 0.5, 'descripcion' => 'Descuento aplicable a las partes superiores', 'categoria' => 1],
            ['id' => 2, 'porcentaje' => 0.3, 'descripcion' => 'Descuento aplicable a las partes inferiores', 'categoria' => 2],
            ['id' => 3, 'porcentaje' => 0.25, 'descripcion' => 'Descuento aplicable a las partes completas', 'categoria' => 3],
            ['id' => 4, 'porcentaje' => 0.15, 'descripcion' => 'Descuento aplicable a los calzados', 'categoria' => 4],

        ]);

        DB::table('productos')->insert([
            ['id' => 1, 'nombre' => 'camiseta', 'descripcion' => 'camiseta de algodón', 'foto' => 'https://www.istockphoto.com/es/foto/camiseta-blanca-en-blanco-gm1158792778-316659573', 'precio' => 10.00, 'talla' => 'S', 'categoria' => 1],
            ['id' => 2, 'nombre' => 'blusa azul', 'descripcion' => 'Blusa de seda de color azul', 'foto' => 'blusa-seda-azul.jpg', 'precio' => 29.99, 'talla' => 'XS', 'categoria' => 1],
            ['id' => 3, 'nombre' => 'camiseta naranja', 'descripcion' => 'camiseta de algodón de color naranja', 'foto' => 'camiseta-naranja.jpg', 'precio' => 10.00, 'talla' => 'M', 'categoria' => 1],
            ['id' => 4, 'nombre' => 'Traje de seda', 'descripcion' => 'Traje de seda', 'foto' => 'traje.jpg', 'precio' => 45.95, 'talla' => 'S', 'categoria' => 3],
            ['id' => 5, 'nombre' => 'Zapatillas de deporte', 'descripcion' => 'Zapatillas de deporte de color blancas', 'foto' => 'zapatillas.jpg', 'precio' => 29.99, 'talla' => 'S', 'categoria' => 4],

        ]);

    }
}
