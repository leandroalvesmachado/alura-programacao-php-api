<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Serie;

class SeriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        return response()->json(Serie::create($request->all()), 201);
    }

    public function show(int $id)
    {
        // 204 No content
        // 404 not found
        $serie = Serie::find($id);

        if (is_null($serie)) {
            return response()->json('', 204);
        }

        return response()->json($serie, 200);
    }

    public function update(Request $request, int $id)
    {
        $serie = Serie::find($id);

        if (is_null($serie)) {
            return response()->json(['erro' => 'recurso não encontrado'], 404);
        }

        $serie->fill($request->all());
        $serie->save();

        return response()->json($serie, 200);
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = Serie::destroy($id);

        if ($qtdRecursosRemovidos === 0) {
            return response()->json([
                'erro' => 'recurso não encontrado'
            ], 404);
        }

        return response()->json('', 204);
    }
}