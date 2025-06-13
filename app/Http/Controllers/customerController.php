<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')->get();
        return view('customers.index', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customers.create');
    }
    public function store(Request $request)
    {
        DB::table('customers')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect('/customers');
    }

    public function edit($id)
    {
        $customer = DB::table('customers')->where('id', $id)->first();
        return view('customers.edit', ['customers' => $customer]);
    }

    public function update(Request $request, $id)
    {
        DB::table('customers')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect('/customers');
    }

    public function destroy($id)
    {
        DB::table('customers')->where('id', $id)->delete();
        return redirect('/customers');
    }
}
