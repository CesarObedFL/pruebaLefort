<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoldItem;

class SoldItemController extends Controller
{
    public function index()
    {
        return SoldItem::all();
    }

}
