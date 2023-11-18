<head>
    <meta charset="utf-8">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<x-app-layout>
    <style>
        .cardCss {
            
            width: 250px;
            height: 350px;
            border-radius: 14px;
            border: 3px solid transparent;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #ffffff;
            transition: all 0.1s ease-in-out;

        }

        .cardCss:hover {
            transition: all 0.1s ease-in-out;
            border: 3px solid #00921C;
        }

        .titulo {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 50%;
            width: 100%;
            background-color: #00921C;
            font-weight: 1000;
            color: white;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suas candidaturas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($candidatura as $candidaturas)
                <div class="card cardCss" style="width: 18rem;">
                    <div class="card-body titulo">
                        <h5 class="card-title ">{{$candidaturas->vaga->tituloVaga}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Empresa: {{$candidaturas->vaga->empresa->nomeEmpresa}}</li>
                        <li class="list-group-item">Periodo: {{$candidaturas->vaga->periodoVaga}}</li>
                        <li class="list-group-item">Local: {{$candidaturas->vaga->localVaga}} </li>
                        <li class="list-group-item">Curso: {{$candidaturas->vaga->curso->nomeCurso}} </li>
                    </ul>
                    <div class="card-body">
                        <div style="display:flex">
                            <a href="{{ route('candidaturas.edit', $candidaturas) }}">
                                <button class="btn bg-green-800  mr-2  text-white hover:bg-green-700">Editar</button>
                            </a>
                            <form action="{{ route('candidaturas.destroy', $candidaturas) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn bg-red-900 text-white hover:bg-red-400" data-toggle="modal" data-target="#confirmModal">
                                    Excluir
                                </button>

                                <!-- Modal -->
                                <div  class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmModalLabel">Confirmação de Exclusão</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Você tem certeza que deseja cancelar sua candidatura?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-green-800  mr-2  text-white hover:bg-green-700" data-dismiss="modal">Não</button>
                                                <button type="button" class="btn bg-red-700 text-white hover:bg-red-400" onclick="deleteItem()">Sim</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function deleteItem() {
                                        document.getElementById("deleteForm").submit();
                                    }
                                </script>
                            </form>
                        </div>
                    </div>

                </div>

                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>