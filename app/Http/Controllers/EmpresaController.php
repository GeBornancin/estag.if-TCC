<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;



class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Empresa::class);

        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $this->authorize('createEmpresa', Empresa::class);
    
    $request->validate([
        'nomeEmpresa' => 'required', 'string', 'max:255',
        'enderecoEmpresa' => 'required', 'string', 'max:255',
        'telefoneEmpresa' => 'required', 'string', 'max:255',
        'emailEmpresa' => 'required', 'string', 'max:255',
        'descricaoEmpresa' => 'required', 'string', 'max:255',
        
    ]);
    
    
    
    try {
       
            $file = $request->file('logoEmpresa');
            $extension = $file->getClientOriginalExtension();
            $filename = hash('sha256', time() . $file->getClientOriginalName()) . '.' . $extension;        
            
            $path = 'logoEmpresa/' . $filename;
           

            $empresa = Empresa::create([
                'nomeEmpresa' => $request->nomeEmpresa,
                'enderecoEmpresa' => $request->enderecoEmpresa,
                'telefoneEmpresa' => $request->telefoneEmpresa,
                'emailEmpresa' => $request->emailEmpresa,
                'statusEmpresa' => $request->statusEmpresa,
                'descricaoEmpresa' => $request->descricaoEmpresa,
                'logoEmpresa' => $filename,
                
                
            ]);

            Storage::disk('s3')->put($path, file_get_contents($file),'public');
            $empresa->save();

    } catch (\Exception $e) {
        // Handle the exception here
        dd($e->getMessage());
    }

    return redirect()->route('empresas.index');
}


    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        $this->authorize('viewEmpresa', Empresa::class);

        return view('empresas.show', compact('empresa'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        $this->authorize('updateEmpresa', Empresa::class);

        return view('empresas.edit', compact(['empresa']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('updateEmpresa', Empresa::class);

        $empresa = Empresa::findOrFail($id);

        $request->validate([
            'nomeEmpresa' => 'required',
            'enderecoEmpresa' => 'required',
            'telefoneEmpresa' => 'required',
            'emailEmpresa' => 'required',
            'descricaoEmpresa' => 'required',
            'logoEmpresa' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $filename = $empresa->logoEmpresa;

        if($request->hasFile('logoEmpresa')){
            $file = $request->file('logoEmpresa');
            $extension = $file->getClientOriginalExtension();
            $filename = hash('sha256', time() . $file->getClientOriginalName()) . '.' . $extension;
            
            $path =  'logoEmpresa'. $filename;

            
            Storage::disk('s3')->put($path, file_get_contents($file),'public');
            
        }
        $empresa->update([
            'nomeEmpresa' => $request->nomeEmpresa,
            'enderecoEmpresa' => $request->enderecoEmpresa,
            'telefoneEmpresa' => $request->telefoneEmpresa,
            'emailEmpresa' => $request->emailEmpresa,
            'descricaoEmpresa' => $request->descricaoEmpresa,
            'statusEmpresa' => $request->statusEmpresa,
            'logoEmpresa' => $filename,
        ]);
        

        $empresa->save();

        return redirect()->route('empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('deleteEmpresa', Empresa::class);


        $empresa = Empresa::findOrFail($id);

        $path = 'logoEmpresa/' . $empresa->logoEmpresa;
        Storage::disk('s3')->delete($path);

        $empresa->delete();

        return redirect()->route('empresas.index');
    }

   
}
