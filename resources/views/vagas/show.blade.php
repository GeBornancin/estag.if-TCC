<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informações da Vaga') }}
        </h2>
        <img src="{{env('AWS_URL')}}/logoEmpresa/{{$empresa->logoEmpresa}}" alt="Logo da empresa" class="img-fluid " width="100px">
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
            <div>
                <x-input-label>
                    Nome da vaga:
                    <h1>{{ $vaga->tituloVaga }}</h1>
                </x-input-label>
                <x-input-label>
                    Descrição da vaga:
                    <h1>{{ $vaga->descricaoVaga }}</h1>
                </x-input-label>
                <x-input-label>
                    Salario da vaga:
                    <h1>{{ $vaga->salarioVaga }}</h1>
                </x-input-label>
                <x-input-label>
                    Local da vaga:
                    <h1>{{ $vaga->localVaga }}</h1>
                </x-input-label>
                <x-input-label>
                    Periodo da vaga:
                    <h1>{{ $vaga->periodoVaga }}</h1>
                </x-input-label>
                <x-input-label>
                    Empresa:
                    <h1>{{ $vaga->empresa->nomeEmpresa }}</h1>
                </x-input-label>
                <x-input-label>
                    Curso:
                    <h1>{{ $vaga->curso->nomeCurso }}</h1>
                </x-input-label>
            </div>
                <a href ="{{ route('candidaturas.create', $vaga) }}">
                    <button class="btn bg-green-800 text-white hover:bg-green-700">Candidatar-se</button>
                </a>

                <a href="{{route('vagas.index') }}">
                    <button  type="button"  class="btn bg-gray-500 text-white hover:bg-gray-400">Cancelar</button>
                </a>
        </div>
    </div>

</x-app-layout>