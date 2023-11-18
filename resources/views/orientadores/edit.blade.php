<x-app-layout>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 20px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 10px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Orientador') }}
        </h2>
    </x-slot>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-1 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="post" action="{{route('orientadores.update', $orientador)}}">
                @csrf
                @method('PUT')
                <div class="form-group">

                    <x-input-label for="nomeOrientador">Nome do Orientador</x-input-label>
                    <x-text-input type="text" class="form-control" id="nomeOrientador" name="nomeOrientador" placeholder="Nome do Orientador" value="{{$orientador->nomeOrientador}}" />
                    <x-input-error :messages="$errors->get('nomeOrientador')" class="mt-2" />

                    <br>
                    
                    <x-input-label for="statusOrientador">Status do Orientador</x-input-label>
                    <label class="switch">
                        <input type="hidden" name="statusOrientador" value="0">
                        <input type="checkbox" name="statusOrientador" id="statusOrientador" value="1" <?php if ($orientador->statusOrientador == 1) echo "checked"; ?>>
                        <span class="slider round"></span>
                    </label>


                    <br>

                    <x-input-label for="curso_id">Curso</x-input-label>
                    <select class="select_" name="curso_id">
                        <option value="">Selecione</option>
                        @foreach($cursos as $curso)
                        <option value="{{$curso->id}}" <?php if ($orientador->curso_id == $curso->id) echo "selected"; ?>>{{$curso->nomeCurso}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('curso_id')" class="mt-2" />
                </div>

                <br>

                <button class="btn  bg-green-800 text-white hover:bg-green-700">Editar</button>
                <button onclick="window.location.href = '{{ route('orientadores.index') }}'" class="btn bg-gray-500 text-white hover:bg-gray-400">Cancelar</button>

            </form>

        </div>
    </div>
</x-app-layout>