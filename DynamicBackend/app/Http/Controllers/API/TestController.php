<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator

class TestController extends Controller
{
    public function createItems(Request $request)
    {

       

        Test::create($request->all());
    }
}
