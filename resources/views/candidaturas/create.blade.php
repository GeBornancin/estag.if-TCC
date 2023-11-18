<x-app-layout>
    <style>
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
    </style>
    <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="post" enctype="multipart/form-data" action="{{route('candidaturas.store', $vaga)}}">
                @csrf
                <div class="form-group">
                    <x-input-label for="curriculo" :value="__('Insira seu curriculo:')"></x-input-label>
                    <input class="form-control" type="file" id="curriculo" name="curriculo" accept="application/pdf">
                    <x-input-error :messages="$errors->get('curriculo')" class="mt-2" />

                    <br>

                    <button  class="btn  bg-green-800 text-white hover:bg-green-700">Candidatar-se</button>
            </form>
                <a href="{{ route('vagas.index') }}">
                    <button type="button" class="btn bg-gray-500 text-white hover:bg-gray-400">Cancelar</button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>