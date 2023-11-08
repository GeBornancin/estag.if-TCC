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

  #logoEmpresa {
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

  #descricaoEmpresa {
    border-color: #3B82F6;
    resize: none;
    height: 200px;
  }
</style>


<head>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

</head>
<x-app-layout>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

      <form method="post" enctype="multipart/form-data" action="{{route('empresas.update', $empresa)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <x-input-label for="nomeEmpresa">Nome da Empresa</x-input-label>
          <x-text-input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" placeholder="Nome do Empresa" value="{{$empresa->nomeEmpresa}}" />
          <x-input-error :messages="$errors->get('nomeEmpresa')" class="mt-2" />

          <br>

          <x-input-label for="enderecoEmpresa">Endereço da Empresa</x-input-label>
          <x-text-input type="text" class="form-control" id="enderecoEmpresa" name="enderecoEmpresa" placeholder="Endereço do Empresa" value="{{$empresa->enderecoEmpresa}}" />
          <x-input-error :messages="$errors->get('enderecoEmpresa')" class="mt-2" />

          <br>

          <x-input-label for="telefoneEmpresa">Telefone da Empresa</x-input-label>
          <x-text-input id="telefoneEmpresa" class="form-control" type="text" name="telefoneEmpresa" value="{{$empresa->telefoneEmpresa}}" required autocomplete="telefoneEmpresa" pattern="\(\d{2}\) \d{5}-\d{4}" maxlength="15" oninput="this.value = this.value.replace(/\D/g, '').replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3')" />
          <x-input-error :messages="$errors->get('telefoneEmpresa')" class="mt-2" />

          <br>

          <x-input-label for="emailEmpresa">Email da Empresa</x-input-label>
          <x-text-input type="email" class="form-control" id="emailEmpresa" name="emailEmpresa" placeholder="Email do Empresa" value="{{$empresa->emailEmpresa}}" />
          <x-input-error :messages="$errors->get('emailEmpresa')" class="mt-2" />

          <br>

          <x-input-label for="descricaoEmpresa">Descrição da Empresa</x-input-label>
          <textarea id="descricaoEmpresa" class="block mt-1 w-full" type="text" name="descricaoEmpresa" <textarea id="descricaoEmpresa" class="block mt-1 w-full" type="text" name="descricaoEmpresa" required autocomplete="descricaoEmpresa">{{$empresa->descricaoEmpresa}}</textarea>
          <x-input-error :messages="$errors->get('descricaoEmpresa')" class="mt-2" />

          <br>

          <x-input-label for="statusEmpresa">Status da Empresa</x-input-label>
          <label class="switch">
            <input type="hidden" name="statusEmpresa" value="0">
            <input type="checkbox" name="statusEmpresa" id="statusEmpresa" value="1" <?php if ($empresa->statusEmpresa == 1) echo "checked"; ?>>
            <span class="slider round"></span>
          </label>

          <br>

          <x-input-label for="logoEmpresa" :value="__('Logo da empresa:')"></x-input-label>
          <input class="form-control" type="file" id="logoEmpresa" name="logoEmpresa" accept="image/png, image/jpeg">


        </div>

        <br>

        <button class="btn  bg-green-800 text-white hover:bg-green-700">Editar</button>
        <button class="btn  btn-secondary">
          <a href="{{route('empresas.index')}}">Cancelar</a>
        </button>
      </form>

      <br>
    </div>
  </div>
</x-app-layout>