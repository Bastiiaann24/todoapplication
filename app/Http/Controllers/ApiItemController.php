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

    public function show($id)
    {
        return Items::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        Items::findOrFail($id)->update($request->all());
        return Response::json($request->all()); //response()->json()
    }

    public function destroy($id)
    {
        return Items::destroy($id);
    }
}