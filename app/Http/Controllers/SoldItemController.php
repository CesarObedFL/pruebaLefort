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

    public function showBySale($id)
    {
        return SoldItem::where('sale_id', $id)->get();
    }

}
