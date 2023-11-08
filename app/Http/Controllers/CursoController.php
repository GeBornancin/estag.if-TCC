<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
<<<<<<< HEAD

=======
    public function __construct()
    {
        $this->middleware('auth');   
    }
>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017
    
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
<<<<<<< HEAD
        $this->authorize('createCurso', Curso::class);

=======
>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017
        $request->validate([
           'nomeCurso' => ['required', 'string', 'max:255'],
        ]);

<<<<<<< HEAD
        $curso = Curso::create([
            'nomeCurso' => $request->nomeCurso,
        ]);

        $curso->save();

        return redirect()->route('cursos.index');

    }

    public function show(Curso $curso)
    {
        //echo "Metodo SHOW";
=======
        $this->authorize('create', Curso::class);

        Curso::create($request->all());

        return redirect()->route('cursos.index');

    }
>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017

        $this->authorize('viewCurso', Curso::class);

        return view('cursos.show', compact(['curso']));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
<<<<<<< HEAD
    
        // Autoriza a ação
        $this->authorize('updateCurso', Curso::class);
=======
        $this->authorize('update', Curso::class);
>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017

        return view('cursos.edit', compact(['curso']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
<<<<<<< HEAD
        $this->authorize('updateCurso', Curso::class);
    
        $curso = Curso::findOrFail($id);

        $request->validate([
            'nomeCurso' => ['required', 'string', 'max:255'],
        ]);

        $curso->update([
            'nomeCurso' => $request->nomeCurso,
        ]);

        $curso->save();
    
=======
        $this->authorize('update', Curso::class);

        $curso->update($request->all());

>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) 
    {
<<<<<<< HEAD
        $this->authorize('deleteCurso', Curso::class);

        $curso = Curso::findOrFail($id);

        $curso->delete();
=======
        $this->authorize('delete', Curso::class);

        Curso::destroy($curso->id);
>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017

        return redirect()->route('cursos.index');
    }
}
