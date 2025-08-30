<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_id' => $this->faker->numberBetween(1, 30),
            'codigo' => $this->faker->unique()->numerify('####'),
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->sentence(),
            'imagen' => $this->faker->imageUrl(640, 480, 'productos'),
            'precio_compra' => $this->faker->randomFloat(2, 10, 100),
            'precio_venta' => $this->faker->randomFloat(2, 15, 100),
            'stock_minimo' => $this->faker->numberBetween(1, 29),
            'stock_maximo' => $this->faker->numberBetween(30, 100),
            'unidad_medida' => $this->faker->randomElement(['Kg', 'g', 'l', 'ml', 'unidad']),
            'estado' => $this->faker->boolean(),
        ];
    }
}
