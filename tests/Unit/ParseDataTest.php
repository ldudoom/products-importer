<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

use App\Importer\Parse\ParseData;

class ParseDataTest extends TestCase
{

    use DatabaseMigrations, WithFaker;

    public function test_parse_data_to_array()
    {
        $category = $this->faker->name();
        $supplier = $this->faker->company();

        $dataToParse = [
                    'id' => Str::random(5),
                    'title' => $this->faker->name(),
                    'price' => $this->faker->randomFloat(2,0),
                    'currency' => $this->faker->currencyCode(),
                    'image' => $this->faker->imageUrl(),
                    'description' => $this->faker->sentence()
            ];

        $oParseData = new ParseData($category, $supplier);
        $dataToArray = $oParseData->dataToArray(json_decode(json_encode($dataToParse)));
        //dd($dataToArray);

        $this->assertTrue(count($dataToArray) == 1);
        $this->assertTrue($dataToArray[0]['category'] == $category);
        $this->assertTrue($dataToArray[0]['supplier'] == $supplier);
        $this->assertTrue($dataToArray[0]['product_data']['title'] == $dataToParse['title']);


    }


    public function test_parse_n_data_to_array()
    {
        $category = $this->faker->name();
        $supplier = $this->faker->company();

        $dataToParse = [
            [
                'id' => Str::random(5),
                'title' => $this->faker->name(),
                'price' => $this->faker->randomFloat(2,0),
                'currency' => $this->faker->currencyCode(),
                'image' => $this->faker->imageUrl(),
                'description' => $this->faker->sentence()
            ],
            [
                'id' => Str::random(5),
                'title' => $this->faker->name(),
                'price' => $this->faker->randomFloat(2,0),
                'currency' => $this->faker->currencyCode(),
                'image' => $this->faker->imageUrl(),
                'description' => $this->faker->sentence()
            ],
            [
                'id' => Str::random(5),
                'title' => $this->faker->name(),
                'price' => $this->faker->randomFloat(2,0),
                'currency' => $this->faker->currencyCode(),
                'image' => $this->faker->imageUrl(),
                'description' => $this->faker->sentence()
            ]
        ];

        $oParseData = new ParseData($category, $supplier);
        $dataToArray = $oParseData->dataToArray(json_decode(json_encode($dataToParse)));
        //dd($dataToArray);

        $this->assertTrue(count($dataToArray) == 3);
        $this->assertTrue($dataToArray[0]['category'] == $category);
        $this->assertTrue($dataToArray[0]['supplier'] == $supplier);
        $this->assertTrue($dataToArray[0]['product_data']['title'] == $dataToParse[0]['title']);


    }


    public function test_get_parse_data()
    {
        $category = $this->faker->name();
        $supplier = $this->faker->company();

        $dataToParse = [
                    'id' => Str::random(5),
                    'title' => $this->faker->name(),
                    'price' => $this->faker->randomFloat(2,0),
                    'currency' => $this->faker->currencyCode(),
                    'image' => $this->faker->imageUrl(),
                    'description' => $this->faker->sentence()
            ];

        $oParseData = new ParseData($category, $supplier);
        $dataToArray = $oParseData->getParsedData(json_decode(json_encode($dataToParse)));
        //dd($dataToArray);

        $this->assertTrue(count($dataToArray) == 1);
        $this->assertTrue($dataToArray[0]['category'] == $category);
        $this->assertTrue($dataToArray[0]['supplier'] == $supplier);
        $this->assertTrue($dataToArray[0]['product_data']['title'] == $dataToParse['title']);


    }
}
