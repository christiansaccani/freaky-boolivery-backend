<?php

namespace App\Http\Controllers;

use App\Mail\OrderRestaurant;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_lead = new Lead();

        $new_lead->fill($data);

        $new_lead->save();

        Mail::to('manu.pogliari@gmail.com')->send(new OrderRestaurant($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}
