<?php

namespace App\Http\Controllers;

use App\Models\Eletrodomestico;
use Illuminate\Http\Request;

class EletrodomesticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $eletrodomesticos = Eletrodomestico::all();
    
            return response()->json($eletrodomesticos, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro no servidor'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nome' => 'required|string|max:200',
                'descricao' => 'required|string|max:200',
                'tensao' => 'required|in:110V,220V,100V,127V,230V,240V,208V,480V',
                'marca' => 'required|string|max:50',
            ]);
    
            Eletrodomestico::create($validatedData);
    
            return response()->json(['message' => 'Objeto criado com sucesso'], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro no servidor'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eletrodomestico  $eletrodomestico
     * @return \Illuminate\Http\Response
     */
    public function show(Eletrodomestico $eletrodomestico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eletrodomestico  $eletrodomestico
     * @return \Illuminate\Http\Response
     */
    public function edit(Eletrodomestico $eletrodomestico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eletrodomestico  $eletrodomestico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'nome' => 'required|string|max:200',
                'descricao' => 'required|string|max:200',
                'tensao' => 'required|in:110V,220V,100V,127V,230V,240V,208V,480V',
                'marca' => 'required|string|max:50',
            ]);
    
            $eletrodomestico = Eletrodomestico::findOrFail($id);
            $eletrodomestico->update($validatedData);
    
            return response()->json(['message' => 'Objeto atualizado com sucesso'], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Objeto não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro no servidor'], 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eletrodomestico  $eletrodomestico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $eletrodomestico = Eletrodomestico::findOrFail($id);
            $eletrodomestico->delete();
    
            return response()->json(['message' => 'Objeto deletado com sucesso'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Objeto não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro no servidor'], 500);
        }
    }
    
}
