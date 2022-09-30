<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    // Exercice 1 sort the string by order
    function sortString(Request $req)
    {
        try {
            $string = $req->json()->all()['string'];

            if (preg_match("#^[a-zA-Z0-9]+$#", $string)) {

                $array = str_split($string);

                sort($array, SORT_NATURAL  | SORT_FLAG_CASE);

                $split = [];
                $count = 0;
                foreach (array_keys($array) as $key) {

                    if (preg_match("/^[a-zA-Z]+$/", $array[$key])) {

                        if ($key === 0) {
                            break;
                        }

                        $split = array_chunk($array, $key);
                        $count++;
                        break;
                    }
                }

                $counter = 0;

                $res = '';

                if ($split !== []) {
                    foreach ($split as $combine) {
                        if ($counter++ == 0) continue;
                        $res = $res . implode($combine);
                    }
                    $result = $res . implode($split[0]);
                } else {
                    $result = implode($array);
                }

                return response()->json([
                    "Success" => true,
                    "Result" => $result
                ]);
            } else {
                return response()->json([
                    "Success" => false,
                    "Error" => "Contains special characters."
                ]);
            }
        } catch (Exception $e) {

            return response()->json([
                "Success" => false,
                "Error" => "$e"
            ]);
        }
    }

    // Exercice 2 deconstruct a number
    function numberDeconstruct(Request $req)
    {
        try {

            $num = $req->json()->all()['num'];
            $result = [];

            if (preg_match("/^-?[0-9]+$/", $num)) {

                $num = str_split($num);

                if ($num[0] === '-') {
                    $counter = 0;
                    foreach (array_keys($num) as $key) {
                        if ($counter++ == 0) continue;
                        $result[] = -$num[$key] * 10 ** (count($num) - $key - 1);
                    }
                } else {
                    foreach (array_keys($num) as $key) {
                        $result[] = $num[$key] * 10 ** (count($num) - $key - 1);
                    }
                }

                return response()->json([
                    "Success" => true,
                    "Result" => $result
                ]);
            } else {
                return response()->json([
                    "Success" => false,
                    "Error" => "Contains letters characters."
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                "Success" => false,
                "Error" => "$e"
            ]);
        }
    }

    // Exercice 3 convert numbers in string to binary
    function numbersToBinary(Request $req)
    {
        try {
            return response()->json([
                "Success" => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                "Success" => false,
                "Error" => "$e"
            ]);
        }
    }

    // Exercice 4 Simple calculations
    function calcuate(Request $req)
    {
        try {
            return response()->json([
                "Success" => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                "Success" => false,
                "Error" => "$e"
            ]);
        }
    }
}
