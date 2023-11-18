<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidatura;
use App\Models\Discente;
use App\Models\Vaga;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CandidaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $discente)
    {
        // $this->authorize('viewCandidatura', Candidatura::class);
        // 
        $discente = Discente::findOrFail($discente);

        $candidaturas = Candidatura::where('discente_id', $discente->id)->get();
        
        return view('candidaturas.index', ['candidatura' => $candidaturas]  ,['discente' => $discente]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $vaga)
    {
        // $this->authorize('create', Candidatura::class);
        
        $vaga = Vaga::findOrFail($vaga);

        

        return view('candidaturas.create', ['vaga' => $vaga]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $vaga)
    {
        // $this->authorize('createCandidatura', Candidatura::class);

        $regras=[
            'curriculo' => 'required|file|mimes:pdf|max:2048',
        ];        

        $mensagensPersonalizadas = [
            'curriculo.required' => 'O campo Curriculo é obrigatório.',
        ];

        $request->validate($regras, $mensagensPersonalizadas);
        if (Auth::user() && Auth::user()->discente) {
            $discenteId = Auth::user()->discente->id;
        } else {
            dd('Você não é um discente');
        }
        
        $file = $request->file('curriculo');
        $filename = $file->getClientOriginalName();
        $path = $request->file('curriculo')->storeAs('curriculos', $filename, 'public');
        
        
        $path = 'curriculo/' . $filename;
        
        $discenteId = Auth::user()->discente->id;
        


        $candidatura = Candidatura::create([
            'discente_id' => $discenteId,
            'vaga_id' => $vaga,
            'dataCandidatura' => Carbon::now(),
            'curriculo' => $filename,
        ]);

        Storage::disk('s3')->put($path, file_get_contents($file), 'public');

        $candidatura->save();

        return redirect()->route('candidaturas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidatura $candidatura)
    {
        // $this->authorize('viewCandidatura', $candidatura);

        return view('candidaturas.show', compact('candidatura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidatura $candidatura)
    {
        $this->authorize('updateCandidatura', $candidatura);
        $discentes = Discente::all();
        $vagas = Vaga::all();

        return view('candidaturas.edit', compact('candidatura', 'discentes', 'vagas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('updateCandidatura', Candidatura::class);

        $candidatura = Candidatura::findOrFail($id);

        $regras = [
            'discente_id' => 'required', Rule::exists(Discente::class, 'id'),
            'vaga_id' => ['required', Rule::exists(Vaga::class, 'id')],
        ];

        $mensagensPersonalizadas = [
            'discente_id.required' => 'O campo Nome do Discente é obrigatório.',
            'vaga_id.required' => 'O campo Nome da Vaga é obrigatório.',
        ];

        $request->validate($regras, $mensagensPersonalizadas);

        if ($request->hasFile('curriculo')) {
            $file = $request->file('curriculo');
            $extension = $file->getClientOriginalExtension();
            $filename = hash('sha256', time() . $file->getClientOriginalName()) . '.' . $extension;

            $path = 'curriculo/' . $filename;
            Storage::disk('s3')->put($path, file_get_contents($file), 'public');
        } else {
            $filename = $candidatura->curriculo;
        }

        $candidatura->update([
            'discente_id' => $request->discente_id,
            'vaga_id' => $request->vaga_id,
            'dataCandidatura' => now(),
            'curriculo' => $filename,
        ]);

        $candidatura->save();

        return redirect()->route('vagas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('deleteCandidatura', Candidatura::class);

        $candidatura = Candidatura::findOrFail($id);

        $path = 'curriculo/' . $candidatura->curriculo;

        Storage::disk('s3')->delete($path);

        $candidatura->delete();

        return redirect()->route('candidaturas.index');
    }
}
//  protected $fillable = [
//         'discente_id',
//         'vaga_id',
//         'curriculo',
//     ]; 

//     protected $dates = [
//         'dataCandidatura'
//     ];