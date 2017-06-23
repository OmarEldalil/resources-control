<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 01/05/2017
 * Time: 02:38 م
 */

namespace App\Services;

use Excel;

class ExcelExtractor {

    public function export ($model) {

        Excel::create('Filename', function($excel) use ($model) {

            $excel->sheet('Sheetname', function($sheet) use ($model) {

                $sheet->fromModel($model);

            });

        })->export('xls');

    }

} 