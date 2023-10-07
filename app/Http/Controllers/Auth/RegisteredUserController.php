<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Discente;
use App\Models\Curso;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Storage;

class RegisteredUserController extends Controller
{
    /**
    * Display the registration view.
    */
    public function create(): View
    {
        $curso = Curso::all(); // Pega todos os cursos
       

        return view('auth.register', compact('curso'));
    }


    /**
    * Handle an incoming registration request.
    *
    * @throws \Illuminate\Validation\ValidationException
    */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'nomeDiscente' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'idadeDiscente' => ['required', 'integer'],
        //     'periodoDiscente' => ['required', 'string', 'max:255'],
        //     'descicaoDiscente' => ['required', 'max:5000'],
        //     'telefoneDiscente' => ['required', 'string', 'max:255'],     
        // ]);

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tipoUsuario' => 'discente',
            ]);

            if ($user->tipoUsuario == 'discente') {
                $fotoDiscente = null;
                if ($request->hasFile('fotoDiscente')) {
                    $file = $request->file('fotoDiscente');
                    $extension = $file->getClientOriginalExtension();
                    $filename = hash('sha256', time() . $file->getClientOriginalName()) . '.' . $extension;
                    
                    $path = 'fotoDiscente/' . $filename;

                    Storage::disk('s3')->put($path, file_get_contents($file));

                }

                
                $discente = Discente::create([
                    'nomeDiscente' => $request->nomeDiscente,
                    'idadeDiscente' => $request->idadeDiscente,
                    'periodoDiscente' => $request->periodoDiscente,
                    'statusDiscente' => true,
                    'descricaoDiscente' => $request->descricaoDiscente,
                    'telefoneDiscente' => $request->telefoneDiscente,
                    'user_id' => $user->id,
                    'curso_id' => $request->curso_id,
                    'fotoDiscente' => $filename, // Salva a URL completa no banco de dados
                ]);
            }

            event(new Registered($user));
            event(new Registered($discente));

            Auth::login($user);
        

        return redirect(RouteServiceProvider::HOME);
    }
}
