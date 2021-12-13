<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() 
    {
        return Customer::all();
    }

    public function create(Request $r) {
        return true;
    }

    public function read($id)
    {
        return Customer::findOrFail($id);
    }

    public function update(Request $r, $id)
    {
        return true;
    }

    public function delete($id)
    {
        return true;
    }
}
