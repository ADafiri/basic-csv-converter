<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvController extends Controller
{
    /**
     * Converts CSV file to an array of rows
     * 
     * @param Request $request
     * 
     * @return response
     * @author AD abdudafiri@gmail.com
     */
    public function convertCsv(Request $request)
    {
        $file = $request->file;
        $filePath = $file->getRealPath(); 

        $openFile = fopen($filePath, "r");
        $data = array();
        $results = array();
        $i = 0;

        while (($filedata = fgetcsv($openFile, 1000, ",")) !== false) {
            $num = count($filedata);

            //Skip first row
            if ($i === 0) {
                $i++;
                continue;
            }

            for ($o = 0; $o < $num; $o++) {
                $dataArray = explode(" ", $filedata[$o]);
                if (count($dataArray) === 3) {
                    $data[$i]['title'] = $dataArray[0];
                    $data[$i]['first_name'] = strpos($dataArray[1], '.') !== false ? null : $dataArray[1];
                    $data[$i]['initial'] = strpos($dataArray[1], '.') !== false ? $dataArray[1] : null;
                    $data[$i]['last_name'] = $dataArray[2];
                }
                if (
                    count($dataArray) > 3
                    && (in_array('and', $dataArray) || in_array('&', $dataArray))
                ) {
                    $dataArray = array_replace($dataArray, array_fill_keys(array_keys($dataArray, '&'), 'and'));
                    $dataString = implode(" ", $dataArray);
                    $preAnd = explode(" and ", $dataString);
                    if (count($preAnd) > 0) {
                        if (str_word_count($preAnd[0], 0) === 1) {
                            $arr = explode(" ", $preAnd[1]);

                            $data[$i][0]['title'] = $preAnd[0];
                            $data[$i][0]['first_name'] = null;
                            $data[$i][0]['initial'] = null;
                            $data[$i][0]['last_name'] = count($arr) > 2 ? $arr[2] : $arr[1];

                            $data[$i][1]['title'] = $arr[0];
                            $data[$i][1]['first_name'] = count($arr) > 2 ? $arr[1] : null;
                            $data[$i][1]['initial'] = null;
                            $data[$i][1]['last_name'] = count($arr) > 2 ? $arr[2] : $arr[1];
                        }
                        if (str_word_count($preAnd[0], 0) === 3) {
                            $arr = explode(" ", $preAnd[0]);
                            $arr2 = explode(" ", $preAnd[1]);

                            $data[$i][0]['title'] = $arr[0];
                            $data[$i][0]['first_name'] = $arr[1];
                            $data[$i][0]['initial'] = null;
                            $data[$i][0]['last_name'] = $arr[2];

                            $data[$i][1]['title'] = $arr2[0];
                            $data[$i][1]['first_name'] = $arr2[1];
                            $data[$i][1]['initial'] = null;
                            $data[$i][1]['last_name'] = $arr2[2];
                        }
                    }
                }
            }

            $i++;
        }

        fclose($openFile);

        return response()->json($data);  
    }
}