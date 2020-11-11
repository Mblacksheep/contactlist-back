<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response(["error" => $validator->errors()]);
        }

        $person = new Person();
        $person->name = $request->name;
        $person->save();

        return response(["person" => $person], 200);
    }
}
