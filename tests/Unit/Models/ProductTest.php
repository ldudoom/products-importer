<?php
namespace Tests\Unit\Models;

use App\Models\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;


class ProductTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    public function test_insert_product()
    {
        $aData = [
            'category' => $this->faker->name(),
            'supplier' => $this->faker->company()
        ];
        Product::factory()->create($aData);
        $this->assertDatabaseHas('products', $aData);
    }
}
