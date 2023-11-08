<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informações da Empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- conteudo -->

            <div>
                <x-input-label>Nome da empresa:
                    <h1>{{ $empresa->nomeEmpresa }}</h1>
                </x-input-label>
                <x-input-label>Endereço da empresa:
                    <h1>{{ $empresa->enderecoEmpresa }}</h1>
                </x-input-label>
                <x-input-label>Telefone da empresa:
                    <h1>{{ $empresa->telefoneEmpresa }}</h1>
                </x-input-label>
                <x-input-label>Email da empresa:
                    <h1>{{ $empresa->emailEmpresa }}</h1>
                </x-input-label>
                <x-input-label>Descrição da empresa:
                    <h1>{{ $empresa->descricaoEmpresa }}</h1>
                </x-input-label>
                <x-input-label>Status da empresa:
                    @if($empresa->statusEmpresa == true)
                        <span class="badge badge-success">Ativo</span>
                    @else
                        <span class="badge badge-danger">Inativo</span>
                    @endif
                </x-input-label>

                <img src="{{ $empresa->getAwsFile() }}" alt="Logo da empresa">
                
               

            </div>


            <br>
            <button class="btn btn-secondary">
                <a href="{{route('empresas.index')}}">Voltar</a>
            </button>
        
        

        <!-- conteudo -->
        </div>            
    </div>
</x-app-layout>
       
