<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;


class ImporterControllerTest extends TestCase
{

    use DatabaseMigrations, WithFaker;

    public function test_import_from_json()
    {
        $productData = '[
            {
              "id": "'.Str::random(5).'",
              "title": "'.$this->faker->name().'",
              "price": '.$this->faker->randomFloat(2,0).',
              "currency": "'.$this->faker->currencyCode().'",
              "details": {
                "image": "'.$this->faker->imageUrl().'",
                "description": "'.$this->faker->sentence().'"
              }
            },
            {
              "id": "'.Str::random(5).'",
              "item_title": "'.$this->faker->name().'",
              "price": "'.$this->faker->randomFloat(2,0).' '.$this->faker->currencyCode().'",
              "main_image": "'.$this->faker->imageUrl().'",
              "description": "'.$this->faker->sentence().'"
            },
            {
              "id": "'.Str::random(5).'",
              "item_title": "'.$this->faker->name().'",
              "price": "'.$this->faker->randomFloat(2,0).' '.$this->faker->currencyCode().'",
              "main_image": "'.$this->faker->imageUrl().'"
            }
          ]';

        $aData = [
            'category' => $this->faker->name(),
            'supplier' => $this->faker->company(),
            'product_data' => $productData
        ];

        $this
            ->post('api/import-json-products', $aData)
            ->assertCreated();

    }



    public function test_import_from_xml()
    {
        $productData = <<<XML
        <?xml version="1.0" encoding="UTF-8"?>
        <products>
           <product>
              <id>P001</id>
              <title>T-shirt M</title>
              <price>25.8</price>
              <currency>USD</currency>
              <details>
                 <description>T-Shirt M</description>
                 <image>https://dominio.ec/img.jpg</image>
              </details>
           </product>
           <product>
              <id>P002</id>
              <title>Sweter</title>
              <price>35.8</price>
              <currency>USD</currency>
              <details>
                 <description>Sweter M</description>
                 <image>https://dominio.ec/img.jpg</image>
              </details>
           </product>
        </products>
        XML;;

        $aData = [
            'category' => $this->faker->name(),
            'supplier' => $this->faker->company(),
            'product_data' => $productData
        ];

        $this
            ->post('api/import-xml-products', $aData)
            ->assertStatus(201);

    }
}
