<?php
namespace App\Importer\Parse;

use App\Importer\Parse\ParseData;

class ParseJSONData extends ParseData
{
    public function getParsedData($unstructuredJSONData){
        $jsonObject = json_decode($unstructuredJSONData);
        $aStructuredData = $this->dataToArray($jsonObject);
        return $aStructuredData;
    }
}
