<?php

namespace App\Http\Controllers;

use App\Models\Items;

use App\Http\Requests;
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
}
