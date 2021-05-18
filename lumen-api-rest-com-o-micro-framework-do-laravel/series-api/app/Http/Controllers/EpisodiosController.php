<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Episodio;

class EpisodiosController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    // public function index(Request $request)
    // {
    //     return Episodio::all();
    // }

    // public function store(Request $request)
    // {
    //     return response()->json(Episodio::create($request->all()), 201);
    // }

    // public function show(int $id)
    // {
    //     // 204 No content
    //     // 404 not found
    //     $serie = Episodio::find($id);

    //     if (is_null($serie)) {
    //         return response()->json('', 204);
    //     }

    //     return response()->json($serie, 200);
    // }

    // public function update(Request $request, int $id)
    // {
    //     $serie = Episodio::find($id);

    //     if (is_null($serie)) {
    //         return response()->json(['erro' => 'recurso não encontrado'], 404);
    //     }

    //     $serie->fill($request->all());
    //     $serie->save();

    //     return response()->json($serie, 200);
    // }

    // public function destroy(int $id)
    // {
    //     $qtdRecursosRemovidos = Episodio::destroy($id);

    //     if ($qtdRecursosRemovidos === 0) {
    //         return response()->json([
    //             'erro' => 'recurso não encontrado'
    //         ], 404);
    //     }

    //     return response()->json('', 204);
    // }

    public function buscaPorSerie(int $serieId)
    {
        // $episodios = Episodio::query()
        //     ->where('serie_id', $serieId)
        //     ->get();

        $episodios = Episodio::query()
            ->where('serie_id', $serieId)
            ->paginate();
        
        return $episodios;
    }

}