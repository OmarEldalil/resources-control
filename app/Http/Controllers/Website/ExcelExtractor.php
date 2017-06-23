<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Excel;

class ExcelExtractor extends Controller
{

    public function extract ($model) {

        $model = "App\Models\\" . ucfirst($model);

        $rows = (new $model)->all()->toArray();

        Excel::create($model . 's', function($excel) use ($rows) {

            $excel->sheet('Sheetname', function($sheet) use ($rows){

                $sheet->fromArray($rows);

            });

        })->download('xlsx');

    }

}
