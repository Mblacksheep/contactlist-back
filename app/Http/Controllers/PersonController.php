<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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

        $contactList = [];
        foreach ($request->contactList as $key => $item) {
            $contact = new Contact();
            $contact->contact_type_id = $item["contactTypeId"];
            $contact->contact_value = $item["value"];
            $contact->person_id = $person->id;
            $contactList[] = $contact;
        }
        $person->contacts()->saveMany($contactList);

        return response(["person" => $person], 200);
    }

    public function update(Request $request)
    {
    }

    public function byId($id)
    {
        $person = Person::with('contacts')->find($id);

        return response(["person" => $person], 200);
    }

    public function all()
    {
        $person = Person::with('contacts')->get();

        return response(["peopleList" => $person], 200);
    }

    public function delete(Request $request)
    {
        $person = Person::find($request->id);
        $person->contacts()->delete();
        $person->delete();
    }
}
