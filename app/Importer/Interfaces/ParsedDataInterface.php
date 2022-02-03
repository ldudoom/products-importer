<?php
namespace App\Importer\Interfaces;

interface ParsedDataInterface{

    public function getParsedData($unstructuredData);

    public function dataToArray($data);

}
