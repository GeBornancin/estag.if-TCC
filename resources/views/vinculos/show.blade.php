<x-app-layout>
    <style>
        span {
            font-size: 14px;
        }

        h1 {
            margin-bottom: 10px;
            display: flex; 
            align-items: center;
        }

        .pdf{
          
            margin-left: 5px;
            width: 40px;
            
        }
        .pdf:hover{
            background-color: #3B82F6;
            border-radius: 10px;
            cursor: pointer;
        }
        .botao{
            margin-top: 10px;
            display: flex; 
            justify-content: center;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informações do Vínculo') }}
        </h2>
    </x-slot>
    <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-green-100 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div>
                <h1>Nome do Aluno: <span> {{ $vinculo->discente->nomeDiscente }} </span></h1>
                </h1>
                <h1>Nome da Empresa: <span> {{ $vinculo->empresa->nomeEmpresa }} </span></h1>
                </h1>
                <h1>Status do Vínculo: <span> {{ $vinculo->statusVinculo ? 'Ativo' : 'Inativo' }} </span></h1>
                </h1>

                <h1 >
                    Contrato:
                    <span>
                        <div class="pdf">
                            <a href="{{env('AWS_URL')}}/contrato/{{$vinculo->contrato}}" target="_blank" >
                                <img src="https://cdn-icons-png.flaticon.com/512/5136/5136982.png" alt="Contrato" class="img-fluid " width="40px">
                            </a>
                        </div>
                    </span>
                </h1>
                <div class="botao"  >
                <button onclick="window.location.href = '{{ route('vinculos.index') }}'" class="btn bg-green-800 text-white hover:bg-green-700">Ok</button>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>