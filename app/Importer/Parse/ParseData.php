<?php
namespace App\Importer\Parse;

use App\Importer\Interfaces\ParsedDataInterface;

class ParseData implements ParsedDataInterface
{
    protected $_category;
    protected $_supplier;

    public function __construct($category, $supplier){
        $this->_category = $category;
        $this->_supplier = $supplier;
    }

    public function getParsedData($unstructuredObjectData){
        $aStructuredData = $this->dataToArray($unstructuredObjectData);
        return $aStructuredData;
    }

    public function dataToArray($data){
        $aStructuredData = [];
        if( ! is_array($data)){
            $aStructuredData[] = [
                'category' => $this->_category,
                'supplier' => $this->_supplier,
                'product_data' => (array)$data,
            ];
        }else{
            foreach($data as $structuredData){
                $aStructuredData[] = [
                    'category' => $this->_category,
                    'supplier' => $this->_supplier,
                    'product_data' => (array)$structuredData,
                ];
            }
        }
        return $aStructuredData;
    }
}
