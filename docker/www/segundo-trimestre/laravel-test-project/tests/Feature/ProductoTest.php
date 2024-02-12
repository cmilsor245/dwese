<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Products;

class ProductoTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_productos() {
      $producto = new Products();
      $producto->name = 'Producto';
      $producto->description = 'Descripcioon';
      $producto->save();
      $response = $this->getJson('/api/products');
      $response->assertStatus(200);

      $response->assertJsonFragment([
        'id' => $producto->id,
        'name' => $producto->name,
        'description' => $producto->description,
        'juntos' => $producto->name . ' - ' . $producto->description,
        'categorias' => $producto->categorias->pluck('nombre')
      ]);
    }
}
