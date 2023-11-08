<x-app-layout>
    <!-- <style>
       
        .container{
            display: flex; 
            margin: 0 auto;
            justify-content: center; 
            align-items: center; 
            width: 400px; 
            position: absolute;
            max-width: 700px;
            
            
        }
    
        .card{
            width: 300px; 
            height: 300px;
            align-items: center;
            display: flex; 
            /* justify-content: center;  */
            align-items: center; 
            flex-direction: column; 
            background-color: white; 
            border-radius: 10px; 
        }
        .card-header {
            background-color: #9BFFA5;
            width: 300px;
            align-items: center; 
            display: flex; 
            justify-content: center; 
        }
        .card-footer{
            width: 300px;
            background-color: #D8D8D8;
            align-items: center; 
            display: flex; 
            justify-content: center; 
            
        }
       
    </style> -->


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

           
                <x-primary-button class="ml-4">
                    <a href="{{ route('vagas.index') }}">Voltar</a>
                </x-primary-button>
            <!-- <div class="container">
                <div class="card">
                    <div class="card-header">
                        {{$vaga->tituloVaga}}
                    </div>
                    <div class="card-body">
                        {{$vaga->empresa->nomeEmpresa}}
                        <br>
                        {{ $vaga->localVaga }}
                        <br>
                        {{ $vaga->periodoVaga }}
                        <br>
                        {{ $vaga->curso->nomeCurso}}
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('vagas.index') }}" class="btn  bg-green-700 hover:bg-green-500">Mais informações</a>
                </div>
            </div> -->

        </div>
    </div>

</x-app-layout>