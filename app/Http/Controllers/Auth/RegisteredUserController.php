<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Discente;
use App\Models\Curso;
use Illuminate\Validation\Rule;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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
            $regras = [
            'nomeDiscente' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
            'curso_id' => ['required', Rule::exists(Curso::class, 'id')], 
            'idadeDiscente' => ['required','numeric', 'between:14,90'],
            'periodoDiscente' => ['required', Rule::in(['Matutino', 'Vespertino', 'Noturno'])],
            'descricaoDiscente' => ['required', 'string', 'max:5000'],
            'telefoneDiscente' => ['required', Rule::unique(Discente::class)],
            ];

        $mensagensPersonalizadas = [
            'nomeDiscente.required' => 'O campo Nome do Discente é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'O campo Email deve ser um endereço de email válido.',
            'email.unique' => 'O Email já está sendo usado por outro usuário.',
            'password.required' => 'O campo Senha é obrigatório.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'password.min' => 'O campo Senha deve ter no mínimo 8 caracteres.',
            'curso_id.required' => 'O campo Curso é obrigatório.',
            'curso_id.exists' => 'O campo Curso deve ser um curso válido.',
            'idadeDiscente.required' => 'O campo Idade é obrigatório.',
            'idadeDiscente.numeric' => 'O campo Idade deve ser um número.',
            'idadeDiscente.between' => 'O campo Idade deve ser entre 14 e 90 anos.',
            'periodoDiscente.required' => 'O campo Período é obrigatório.',
            'periodoDiscente.in' => 'O campo Período deve ser Matutino, Vespertino ou Noturno.',
            'descricaoDiscente.required' => 'O campo Descrição é obrigatório.',
            'descricaoDiscente.max' => 'O campo Descrição não pode ter mais de 5000 caracteres.',
            'telefoneDiscente.required' => 'O campo Telefone é obrigatório.',
            'telefoneDiscente.unique' => 'Este Telefone já está em uso.',
        ];

        $request->validate($regras, $mensagensPersonalizadas);

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tipoUsuario' => 'discente',
            ]);

            if ($user->tipoUsuario == 'discente') {
                if ($request->hasFile('fotoDiscente')) {
                    $file = $request->file('fotoDiscente');
                    $extension = $file->getClientOriginalExtension();
                    $filename = hash('sha256', time() . $file->getClientOriginalName()) . '.' . $extension;
                    
                    $path = 'fotoDiscente/' . $filename;

                    
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
                Storage::disk('s3')->put($path, file_get_contents($file));
            }

            event(new Registered($user));
            event(new Registered($discente));

            Auth::login($user);
        

        return redirect(RouteServiceProvider::HOME);
    }
}
