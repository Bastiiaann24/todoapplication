<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Requests;
use App\Models\Items;
use Illuminate\Http\Request;

class ApiItemController extends Controller
{
    public function index() {
        return Items::all();
    }

    public function store(Request $request) {
        return Items::create($request->all());
    }
}