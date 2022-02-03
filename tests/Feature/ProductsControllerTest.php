<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;

class ProductsControllerTest extends TestCase
{

    use DatabaseMigrations, WithFaker;

    public function test_products_list()
    {

        $supplier = $this->faker->company();
        Product::factory(5)->create(['supplier' => $supplier]);
        $response = $this->get('/api/products-list');

        $response->assertOk();
        $response->assertJsonCount(5, 'data');
        $response->assertJsonFragment(['supplier' => $supplier]);
    }
}
