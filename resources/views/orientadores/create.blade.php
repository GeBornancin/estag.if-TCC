<head>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
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

<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="post" action="{{route('orientadores.store')}}">
                @csrf
                <div class="form-group">
                    <x-input-label for="nomeOrientador">Nome do Orientador</x-input-label>
                    <x-text-input type="text" class="form-control" id="nomeOrientador" name="nomeOrientador" placeholder="Nome do Orientador" />
                    <x-input-error :messages="$errors->get('nomeOrientador')" class="mt-2" />

                    <br>

                    <x-input-label for="statusOrientador">Status do Orientador</x-input-label>
                    <label class="switch">

                        <input type="hidden" name="statusOrientador" value="0" />
                        <input type="checkbox" name="statusOrientador" id="statusOrientador" value="1">

                        <span class="slider round"></span>
                    </label>

                    <br>

                    <x-input-label for="curso_id">Curso</x-input-label>
                    <select class="select_" name="curso_id">
                        <option value="">Selecione</option>
                        @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nomeCurso}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('curso_id')" class="mt-2" />

                </div>

                <br>

                <button class="btn  bg-green-800 text-white hover:bg-green-700">Criar</button>
                <button class="btn  btn-secondary">
                    <a href="{{route('orientadores.index')}}">Voltar</a>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
<!-- 'nomeOrientador',
            'statusOrientador',
            'curso_id' -->