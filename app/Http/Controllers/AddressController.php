<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function index()
    {
        return view('address.index')->with('address', Address::all());
    }

    public function create()
    {
        return view('address.create');
    }


    public function store(Request $request)
    {
        Address::create($request->all());
        session()->flash('success','Endereço foi cadastrado com sucesso!');
        return redirect(route('address.index'));
    }


    public function show(Address $address)
    {
        //
    }


    public function edit(Address $address)
    {
        return view('address.edit')->with('address', $address);
    }


    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
        session()->flash('success','Endereço alterado com sucesso!');
        return redirect(route('address.index'));
    }


    public function destroy(Address $address)
    {
        $address->delete();
        session()->flash('success','Endereço apagado com sucesso!');
        return redirect(route('address.index'));
    }
}
