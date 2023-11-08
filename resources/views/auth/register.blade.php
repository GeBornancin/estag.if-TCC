<style>
    .select_ {
        border-color: #3B82F6;
        width: 400px;
        height: 40px;
        padding: 0 10px;
        border-radius: 5px;
        background-color: #ffffff;
        font-size: 16px;
        color: #16A34A;
        outline: none;
    }
    #fotoDiscente{
        color: #16A34A;
    }
    input::file-selector-button {
        font-weight: bold;
        color: white;
        border-width: 3px;
        background-color: #166534;
        
        padding: 0.5em;
        border: thin solid #166534;
        border-radius: 3px;
        
        
    }
    input::file-selector-button:hover {
        background-color: #15803D;
        cursor: grab;
    }
    #descricaoDiscente{
        border-color: #3B82F6;
        resize: none;
        height: 200px;
    }
    
   
</style>

<x-guest-layout>
    
    <!-- <div class="image-logo" style="display: flex; justify-content: center; align-items: center;">
               
        <x-image-text-logo  />
        
    </div> -->
    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nomeDiscente" :value="__('Nome')" />
            <x-text-input id="nomeDiscente" class="block mt-1 w-full" type="text" name="nomeDiscente" :value="old('name')"
              />
            <x-input-error :messages="$errors->get('nomeDiscente')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
             />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Idade -->
        <div class="mt-4">
            <x-input-label for="idadeDiscente" :value="__('Idade')" />
            <x-text-input id="idadeDiscente" class="block mt-1 w-full" type="number" name="idadeDiscente"
                :value="old('idadeDiscente')"  />
            <x-input-error :messages="$errors->get('idadeDiscente')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="telefoneDiscente" :value="__('Telefone')" />
            <x-text-input id="telefoneDiscente" class="block mt-1 w-full" type="text" name="telefoneDiscente"
                :value="old('telefoneDiscente')" 
                placeholder="(99) 99999-9999" 
                pattern="\(\d{2}\) \d{5}-\d{4}" maxlength="15" 
                oninput="this.value = this.value.replace(/\D/g, '').replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3')" />
            <x-input-error :messages="$errors->get('telefoneDiscente')" class="mt-2" />
        </div>
        
        

        <!-- Periodo -->
        <div class="mt-4">
            <x-input-label for="periodoDiscente" :value="__('Periodo')" />
            <select class="select_" name="periodoDiscente" >
                <option value="">Selecione um periodo</option>
                <option value="Matutino">Matutino</option>
                <option value="Vespertino">Vespertino</option>
                <option value="Noturno">Noturno</option>
            </select>
            <x-input-error :messages="$errors->get('periodoDiscente')" class="mt-2" />
        </div>

        <!-- Curso -->
        <div class="mt-4">
            <x-input-label for="curso" :value="__('Curso')" />
            <select class="select_" name="curso_id" >
                <option value="">Selecione um curso</option>
                @foreach ($curso as $cursos)
                    <option value="{{ $cursos->id }}">{{ $cursos->nomeCurso }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('curso_id')" class="mt-2" />
        </div>
        
        <!-- Foto -->
        <div class="mt-4">
            <div class="mb-3">
              <x-input-label for="fotoDiscente" :value="__('Escolha uma foto de perfil:')" />
              <input class="form-control" type="file" id="fotoDiscente" name="fotoDiscente" accept="image/png, image/jpeg">
            </div>
        </div>

        <!-- Descrição -->
        <div class="mt-6">
            <x-input-label for="descricaoDiscente" :value="__('Escreva um pouco sobre você')" />
            <textarea id="descricaoDiscente" class="block mt-1 w-full" type="text" name="descricaoDiscente"
                :value="old('descricaoDiscente')"></textarea>
            <x-input-error :messages="$errors->get('descricaoDiscente')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-green-800"
                href="{{ route('login') }}">
                {{ __('Já tem uma conta?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
    @if (\Session::has('error'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif
</x-guest-layout>
