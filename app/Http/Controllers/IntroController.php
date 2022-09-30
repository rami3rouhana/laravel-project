<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    // Exercice 1 sort the string by order
    function sortString(Request $req)
    {
        return json_decode($req->getContent(), true)->string;
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
