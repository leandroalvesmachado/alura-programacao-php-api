<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $classe;

    public function index(Request $request)
    {
        // implementando paginacao
        // $offset = ($request->page - 1) * $request->per_page;
        // return $this->classe::query()
        //     ->offset($offset)
        //     ->limit($request->per_page)
        //     ->get();

        // paginacao com o lumen
        return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all()), 201);
    }

    public function show(int $id)
    {
        // 204 No content
        // 404 not found
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()->json('', 204);
        }

        return response()->json($recurso, 200);
    }

    public function update(Request $request, int $id)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()->json(['erro' => 'recurso não encontrado'], 404);
        }

        $recurso->fill($request->all());
        $recurso->save();

        return response()->json($recurso, 200);
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = $this->classe::destroy($id);

        if ($qtdRecursosRemovidos === 0) {
            return response()->json([
                'erro' => 'recurso não encontrado'
            ], 404);
        }

        return response()->json('', 204);
    }
}