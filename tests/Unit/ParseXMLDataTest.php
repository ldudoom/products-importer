<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

use App\Importer\Parse\ParseXMLData;

class ParseXMLDataTest extends TestCase
{

    use DatabaseMigrations, WithFaker;

    public function test_get_parse_xml_data()
    {
        $category = $this->faker->name();
        $supplier = $this->faker->company();

        $dataToParse = <<<XML
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
        </products>
        XML;

        $oParseData = new ParseXMLData($category, $supplier);
        $dataToArray = $oParseData->getParsedData($dataToParse);

        $this->assertTrue(count($dataToArray) == 1);
        $this->assertTrue($dataToArray[0]['category'] == $category);
        $this->assertTrue($dataToArray[0]['supplier'] == $supplier);
        $this->assertTrue($dataToArray[0]['product_data']['title'] == 'T-shirt M');
    }
}
