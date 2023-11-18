<style>
  /* The switch - the box around the slider */
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

  #contrato {
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

</style>
<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{route('vinculos.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <x-input-label for="discente_id">Discente</x-input-label>
                    <select name="discente_id" class="select_" >
                        <option value="">Selecione</option>
                        @foreach($discentes as $discente)
                            <option value="{{$discente->id}}">{{$discente->nomeDiscente}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('discente_id')" class="mt-2" />

                    <br>

                    <x-input-label for="empresa_id">Empresa</x-input-label>
                    <select name="empresa_id" class="select_" >
                        <option value="">Selecione</option>
                        @foreach($empresas as $empresa)
                            <option value="{{$empresa->id}}">{{$empresa->nomeEmpresa}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('empresa_id')" class="mt-2" />

                    <br>

                    <x-input-label for="orientador_id">Orientador</x-input-label>
                    <select name="orientador_id" class="select_" >
                        <option value="">Selecione</option>
                        @foreach($orientadores as $orientador)
                            <option value="{{$orientador->id}}">{{$orientador->nomeOrientador}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('orientador_id')" class="mt-2" />

                    <br>

                    <x-input-label for="statusVinculo">Status do Vinculo</x-input-label>
                    <label class="switch">

                        <input type="hidden" name="statusVinculo" value="0" />
                        <input type="checkbox" name="statusVinculo" id="statusVinculo" value="1">

                        <span class="slider round"></span>
                    </label>

                    <br>

                    <x-input-label for="contrato" :value="__('Contrato:')"></x-input-label>
                    <input class="form-control" type="file" id="contrato" name="contrato" accept="application/pdf">
                    <x-input-error :messages="$errors->get('contrato')" class="mt-2" />
                </div>

                <br>

                <button class="btn  bg-green-800 text-white hover:bg-green-700">Criar</button>
                <button class="btn  btn-secondary">
                    <a href="{{route('vinculos.index')}}">Voltar</a>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>