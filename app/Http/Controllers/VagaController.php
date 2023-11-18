<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vaga;
use App\Models\Empresa;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        $cursos = Curso::all();
        $vagas = Vaga::all();

        return view('vagas.index', compact('vagas', 'empresas', 'cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Vaga::class);

        $empresas = Empresa::all();
        $cursos = Curso::all();

        return view('vagas.create', compact('empresas', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('createVaga', Vaga::class);

        $regras=[
            'tituloVaga' => 'required', 'string', 'max:255',
            'descricaoVaga' => 'required', 'string', 'max:255',
            'salarioVaga' => 'required', 'string', 'max:255',
            'localVaga' => 'required', 'string', 'max:255',
            'periodoVaga' => 'required', 'string', 'max:255',
            'empresa_id' => 'required', Rule::exists(Empresa::class, 'id'),
            'curso_id' => ['required', Rule::exists(Curso::class, 'id')], 
        ];        

        $mensagensPersonalizadas = [
            'tituloVaga.required' => 'O campo Nome da Vaga é obrigatório.',
            'descricaoVaga.required' => 'O campo Descrição da Vaga é obrigatório.',
            'salarioVaga.required' => 'O campo Salário da Vaga é obrigatório.',
            'localVaga.required' => 'O campo Local da Vaga é obrigatório.',
            'periodoVaga.required' => 'O campo Período da Vaga é obrigatório.',
            'empresa_id.required' => 'O campo Empresa é obrigatório.',
            'curso_id.required' => 'O campo Curso é obrigatório.',
            'empresa_id.exists' => 'A Empresa informada não existe.',
            'curso_id.exists' => 'O Curso informado não existe.',
            
        ];

        $request->validate($regras, $mensagensPersonalizadas);

        
        $vaga = Vaga::create([
            'tituloVaga' => $request->tituloVaga,
            'descricaoVaga' => $request->descricaoVaga,
            'salarioVaga' => $request->salarioVaga,
            'localVaga' => $request->localVaga,
            'periodoVaga' => $request->periodoVaga,
            'empresa_id' => $request->empresa_id,
            'curso_id' => $request->curso_id,
        ]);

        $vaga->save();

        return redirect()->route('vagas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaga $vaga)
    {
        // $this->authorize('viewVaga', Vaga::class);

        $empresa = $vaga->empresa;



        return view('vagas.show', compact('vaga','empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaga $vaga)
    {
        $this->authorize('updateVaga', Vaga::class);
        $empresas = Empresa::all();
        $cursos = Curso::all();


        return view('vagas.edit', compact('vaga', 'empresas', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('updateVaga', Vaga::class);

        $vaga = Vaga::findOrFail($id);

        $regras=[
            'nomeVaga' => 'required', 'string', 'max:255',
            'descricaoVaga' => 'required', 'string', 'max:255',
            'salarioVaga' => 'required', 'string', 'max:255',
            'localVaga' => 'required', 'string', 'max:255',
            'periodoVaga' => 'required', 'string', 'max:255',
            'empresa_id' => 'required', Rule::exists(Empresa::class, 'id'),
            'curso_id' => ['required', Rule::exists(Curso::class, 'id')], 
        ];        

        $mensagensPersonalizadas = [
            'nomeVaga.required' => 'O campo Nome da Vaga é obrigatório.',
            'descricaoVaga.required' => 'O campo Descrição da Vaga é obrigatório.',
            'salarioVaga.required' => 'O campo Salário da Vaga é obrigatório.',
            'localVaga.required' => 'O campo Local da Vaga é obrigatório.',
            'periodoVaga.required' => 'O campo Período da Vaga é obrigatório.',
            'empresa_id.required' => 'O campo Empresa é obrigatório.',
            'curso_id.required' => 'O campo Curso é obrigatório.',
        ];

        $request->validate($regras, $mensagensPersonalizadas);

        $vaga->update([
            'nomeVaga' => $request->nomeVaga,
            'descricaoVaga' => $request->descricaoVaga,
            'salarioVaga' => $request->salarioVaga,
            'localVaga' => $request->localVaga,
            'periodoVaga' => $request->periodoVaga,
            'empresa_id' => $request->empresa_id,
            'curso_id' => $request->curso_id,
        ]);

        $vaga->save();

        return redirect()->route('vagas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('deleteVaga', Vaga::class);

        $vaga = Vaga::findOrFail($id);

        $vaga->delete();

        return redirect()->route('vagas.index');
    }
}
//  protected $fillable = [
//         'tituloVaga',
//         'descricaoVaga',
//         'salarioVaga',
//         'localVaga',
//         'periodoVaga',
//         'empresa_id',
//         'curso_id',
//     ];