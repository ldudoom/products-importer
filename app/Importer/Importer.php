<?php
namespace App\Importer;

use App\Importer\Interfaces\ImporterInterface;
use App\Importer\Interfaces\ParsedDataInterface;
use App\Models\Product;

class Importer implements ImporterInterface
{
    private $_parsedData;

    public function __construct(ParsedDataInterface $parsedData)
    {
        $this->_parsedData = $parsedData;
    }

    public function import($productData){
        $aParsedData = $this->_parsedData->getParsedData($productData);
        foreach($aParsedData as $productData){
            Product::create($productData);
        }
    }
}
