<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Orientador;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrientadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        $orientadores = Orientador::all();

        return view('orientadores.index', compact('orientadores', 'cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Orientador::class);

        $cursos = Curso::all();

        return view('orientadores.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('createOrientador', Orientador::class);

        $regras=[
            'nomeOrientador' => 'required', 'string', 'max:255',
            'statusOrientador' => 'required',
            'curso_id' => ['required', Rule::exists(Curso::class, 'id')], 
        ];

        $mensagensPersonalizadas = [
            'nomeOrientador.required' => 'O campo Nome do Orientador é obrigatório.',
            'statusOrientador.required' => 'O campo Status do Orientador é obrigatório.',
            'curso_id.required' => 'O campo Curso é obrigatório.',
            'curso_id.exists' => 'O Curso informado não existe.',
        ];

        $request->validate($regras, $mensagensPersonalizadas);

        $orientador = Orientador::create([
            'nomeOrientador' => $request->nomeOrientador,
            'statusOrientador' => $request->statusOrientador,
            'curso_id' => $request->curso_id,
        ]);
       
        
        $orientador->save();

        return redirect()->route('orientadores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orientador $orientador)
    {
        $this->authorize('viewOrientador', Orientador::class);


        return view('orientadores.show', compact('orientador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orientador $orientador)
    {
        $this->authorize('updateOrientador', Orientador::class);
        
        $cursos = Curso::all();

        return view('orientadores.edit', compact('orientador', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orientador $orientador)
    {
        $this->authorize('updateOrientador', Orientador::class);

        $orientador = Orientador::findOrFail($orientador->id);

        $regras=[
            'nomeOrientador' => 'required', 'string', 'max:255',
            'statusOrientador' => 'required',
            'curso_id' => ['required', Rule::exists(Curso::class, 'id')], 
        ];

        $mensagensPersonalizadas = [
            'nomeOrientador.required' => 'O campo Nome do Orientador é obrigatório.',
            'statusOrientador.required' => 'O campo Status do Orientador é obrigatório.',
            'curso_id.required' => 'O campo Curso é obrigatório.',
            'curso_id.exists' => 'O Curso informado não existe.',
        ];

        $request->validate($regras, $mensagensPersonalizadas);

        $orientador->update([
            'nomeOrientador' => $request->nomeOrientador,
            'statusOrientador' => $request->statusOrientador,
            'curso_id' => $request->curso_id,
        ]);

        $orientador->save();

        return redirect()->route('orientadores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('deleteOrientador', Orientador::class);

        $orientador = Orientador::findOrFail($id);

        $orientador->delete();

        return redirect()->route('orientadores.index');
    }
}
