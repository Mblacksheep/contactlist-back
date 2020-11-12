<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function create(Request $request)
    {
        if ($request->id) {
            $contact = Contact::find($request->id);
        } else {
            $contact = new Contact();
        }

        $contact = new Contact();
        $contact->contact_type_id = $request["contactTypeId"];
        $contact->contact_value = $request["value"];
        $contact->person_id = $request["personId"];
        $contact->save();

        return response(["contact" => $contact], 200);
    }

    public function getById(Request $request)
    {
        $contact = Contact::with('contactType')->find($request->id);

        return response(["contact" => $contact], 200);
    }

    public function getAll()
    {
        $contact = Contact::with('contactType')->orderBy('name', 'ASC')->get();

        return response(["contactList" => $contact], 200);
    }

    public function delete(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->delete();
    }
}
