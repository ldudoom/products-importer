<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Importer\Importer;
use App\Importer\Parse\ParseJSONData;
use App\Importer\Parse\ParseXMLData;

class ImporterController extends Controller
{
    public function importFromJSON(Request $request){
        $oParseJsonData = new ParseJSONData($request->category, $request->supplier);
        $oImporter = new Importer($oParseJsonData);
        $oImporter->import($request->product_data);
        return response()->json([], Response::HTTP_CREATED);
    }

    public function importFromXML(Request $request){
        $oParseJsonData = new ParseXMLData($request->category, $request->supplier);
        $oImporter = new Importer($oParseJsonData);
        $oImporter->import($request->product_data);
        return response()->json([], Response::HTTP_CREATED);
    }
}
