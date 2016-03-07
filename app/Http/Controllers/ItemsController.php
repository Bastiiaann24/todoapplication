<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemsController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index() {
        return view('items.fetchItems');
    }

    public function save(Request $request)
    {
        //ToDo validate request

        $item = new Items();

        $item->title = $request->name;
        $item->description = 'Niet aanwezig';
        $item->order = $request->order;
        $item->completed = $request->completed;

        $item->save();
    }

    public function getItems()
    {
        $items = Items::all();

        $data = ['items' => $items];
        return view('items', $data);
    }
}
