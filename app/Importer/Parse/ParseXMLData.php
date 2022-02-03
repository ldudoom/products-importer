<?php
namespace App\Importer\Parse;

use App\Importer\Parse\ParseData;

class ParseXMLData extends ParseData
{
    public function getParsedData($unstructuredXMLData){
        $oUnstructuredData = simplexml_load_string($unstructuredXMLData);
        $oUnstructuredJSONData = json_encode($oUnstructuredData);
        $oUnstructuredObjectData = json_decode($oUnstructuredJSONData);
        $aStructuredData = $this->dataToArray($oUnstructuredObjectData->product);
        return $aStructuredData;
    }
}
