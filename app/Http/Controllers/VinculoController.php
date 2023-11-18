<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vinculo;
use App\Models\Empresa;
use App\Models\Discente;
use App\Models\Orientador;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VinculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        $discentes = Discente::all();
        $orientadores = Orientador::all();
        $vinculos = Vinculo::all();

        return view('vinculos.index', compact('vinculos', 'empresas', 'discentes', 'orientadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Vinculo::class);

        $empresas = Empresa::all();
        $discentes = Discente::all();
        $orientadores = Orientador::all();


        return view('vinculos.create', compact('empresas', 'discentes', 'orientadores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('createVinculo', Vinculo::class);

        $regras=[
            'discente_id' => 'required', Rule::exists(Discente::class, 'id'),
            'empresa_id' => 'required', Rule::exists(Empresa::class, 'id'),
            'orientador_id' => 'required', Rule::exists(Orientador::class, 'id'),
            'contrato' => 'required|file|mimes:pdf|max:2048',
        ];

        $mensagensPersonalizadas = [
            'discente_id.required' => 'O campo Discente é obrigatório.',
            'empresa_id.required' => 'O campo Empresa é obrigatório.',
            'orientador_id.required' => 'O campo Orientador é obrigatório.',
            'contrato.required' => 'O campo Contrato é obrigatório.',

        ];

        $request->validate($regras, $mensagensPersonalizadas);

        $file = $request->file('contrato');
        $extension = $file->getClientOriginalExtension();
        $filename = hash('sha256', time() . $file->getClientOriginalName()) . '.' . $extension;

        $path = 'contrato/' . $filename;

        $vinculo = Vinculo::create([
            'discente_id' => $request->discente_id,
            'empresa_id' => $request->empresa_id,
            'orientador_id' => $request->orientador_id,
            'statusVinculo' => $request->statusVinculo,
            'contrato' => $filename,
        ]);

        Storage::disk('s3')->put($path, file_get_contents($file), 'public');

        $vinculo->save();

        return redirect()->route('vinculos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vinculo $vinculo)
    {
        $this->authorize('viewVinculo', $vinculo);

        return view('vinculos.show', compact('vinculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vinculo $vinculo)
    {
        $this->authorize('updateVinculo', $vinculo);

        $empresas = Empresa::all();
        $discentes = Discente::all();
        $orientadores = Orientador::all();


        return view('vinculos.edit', compact('vinculo', 'empresas', 'discentes', 'orientadores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('updateVinculo', Vinculo::class);

        $vinculo = Vinculo::findOrFail($id);

        $regras=[
            'discente_id' => 'required', Rule::exists(Discente::class, 'id'),
            'empresa_id' => 'required', Rule::exists(Empresa::class, 'id'),
            'orientador_id' => 'required', Rule::exists(Orientador::class, 'id'),   
        ];

        $mensagensPersonalizadas = [
            'discente_id.required' => 'O campo Discente é obrigatório.',
            'empresa_id.required' => 'O campo Empresa é obrigatório.',
            'orientador_id.required' => 'O campo Orientador é obrigatório.',
            'contrato.required' => 'O campo Contrato é obrigatório.',
        ];

        $request->validate($regras, $mensagensPersonalizadas);


        if($request->hasFile('contrato')){

            $file = $request->file('contrato');
            $extension = $file->getClientOriginalExtension();
            $filename = hash('sha256', time() . $file->getClientOriginalName()) . '.' . $extension;
    
            $path = 'contrato/' . $filename;
            Storage::disk('s3')->put($path, file_get_contents($file), 'public');
        }else{
            $filename = $vinculo->contrato;
        }

        $vinculo->update([
            'discente_id' => $request->discente_id,
            'empresa_id' => $request->empresa_id,
            'orientador_id' => $request->orientador_id,
            'statusVinculo' => $request->statusVinculo,
            'contrato' => $filename,
        ]);


        $vinculo->save();

        return redirect()->route('vinculos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('deleteVinculo', Vinculo::class);

        $vinculo = Vinculo::findOrFail($id);

        $path = 'contrato/' . $vinculo->contrato;
        
        Storage::disk('s3')->delete($path);

        $vinculo->delete();

        return redirect()->route('vinculos.index');
    }
}
//         'discente_id',
//         'empresa_id',
//         'orientador_id',
//         'statusVinculo',
//         'contrato'