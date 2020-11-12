<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BalancedBracketsController extends Controller
{
    public function balancedBrackets(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required'
        ]);
        if ($validator->fails()) {
            return response(["error" => $validator->errors()]);
        }

        $string = $request->value;
        $brackets = ["[]", "{}", "()"];

        if (strlen($string) % 2 || $string == null) {
            return response(["result" => false]);
        } else {
            $count = true;
            while ($count) {
                $string = str_replace($brackets, "", $string, $count);
            }
            if (strlen($string) == 0) {
                return response(["result" => true]);
            } else {
                return response(["result" => false]);
            }
        }
    }
}
