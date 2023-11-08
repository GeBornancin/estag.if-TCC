<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Curso::class);

        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('createCurso', Curso::class);

        $request->validate([
           'nomeCurso' => ['required', 'string', 'max:255'],
        ]);

        $curso = Curso::create([
            'nomeCurso' => $request->nomeCurso,
        ]);

        $curso->save();

        return redirect()->route('cursos.index');

    }

    public function show(Curso $curso)
    {
        //echo "Metodo SHOW";

        $this->authorize('viewCurso', Curso::class);

        return view('cursos.show', compact(['curso']));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
    
        // Autoriza a ação
        $this->authorize('updateCurso', Curso::class);

        return view('cursos.edit', compact(['curso']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('updateCurso', Curso::class);
    
        $curso = Curso::findOrFail($id);

        $request->validate([
            'nomeCurso' => ['required', 'string', 'max:255'],
        ]);

        $curso->update([
            'nomeCurso' => $request->nomeCurso,
        ]);

        $curso->save();
    
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) 
    {
        $this->authorize('deleteCurso', Curso::class);

        $curso = Curso::findOrFail($id);

        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
