<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dog;

class DogController extends Controller
{
    public function index()
    {
        return Dog::all();
    }

    public function store(Request $request)
    {
       Dog::create($request->all());
       return response()->json("Cachorro adicionado com sucesso!");
    }

    public function show($id)
    {
        return Dog::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $dog = Dog::findOrFail($id);
        $dog->update($request->all());
        return response()->json("Dados do cachorro " . $id . " atualizados com sucesso!");
    }

    public function destroy($id)
    {
        $dog = Dog::findOrFail($id);
        $dog->delete();
        return response()->json("Cachorro " . $id . " deletado com sucesso!");
    }
}
