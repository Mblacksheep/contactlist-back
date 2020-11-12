<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    public function all()
    {
        $contactTypeList = ContactType::get();

        return response(["contactTypeList" => $contactTypeList], 200);
    }
}
