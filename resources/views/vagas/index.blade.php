<head>
    <meta charset="utf-8">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<x-app-layout>
    <style>
        .logo {
            margin-left: 50px;
            max-width: 110px;
            max-height: 40px;
            width: auto;
            height: auto;
        }

        .cardCss {

            position: relative;
            width: 250px;
            height: 350px;
            border-radius: 14px;
            z-index: 1111;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #ffffff;
            transition: all 0.3s ease-in-out; /* Add this line */

        }

        .cardCss:hover {
            transform:translateY(10px);
            transition: all 0.3s ease-in-out;
            border: 3px solid #00921C;
            
        }

        .titulo {
            width: 100%;
            background-color: #00921C;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Encontre sua vaga de estágio') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <x-text-input type="text" class="form-control" id="filtroNome" placeholder="Filtrar vagas por nome" />
            </div>


            @if(Auth::check())
            <div style="margin-bottom:2%">
                <button type="button" class="btn btn-outline-primary">
                    <a href="{{route('vagas.create')}}">Criar Vagas</a>
                </button>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($vagas as $vaga)

                <div class="card cardCss" style="width: 18rem;">
                    <div class="card-body titulo">
                        <h5 class="card-title ">{{$vaga->tituloVaga}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Empresa: {{$vaga->empresa->nomeEmpresa}}</li>
                        <li class="list-group-item">Periodo: {{$vaga->periodoVaga}}</li>
                        <li class="list-group-item">Local: {{$vaga->localVaga}} </li>
                        <li class="list-group-item">Curso: {{$vaga->curso->nomeCurso}} </li>
                    </ul>
                    <div class="card-body">
                        <div style="display:flex">
                            @auth
                            <!-- @can('delete', $vaga) -->
                            <div style="margin-right:2%;">
                                <form method="post" action=" {{ route('vagas.destroy', $vaga) }} " onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($vaga->titulo) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                            <!-- @endcan -->

                            <!-- @can('update', $vaga) -->
                            <div style="margin-right:2%;">
                                <button type="button" class="btn btn-outline-success">
                                    <a href="{{ route('vagas.edit', $vaga) }}">Editar</a>
                                </button>
                            </div>
                            <!-- @endcan -->

                            <!-- @can('view', $vaga) -->
                            <div style="margin-right:2%;">
                                <button type="button" class="btn btn-outline-info">
                                    <a href="{{ route('vagas.show', $vaga) }}">Informações</a>
                                </button>
                            </div>
                            <!-- @endcan -->
                            @endauth

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        // Captura o campo de entrada
        const filtroNomeInput = document.getElementById('filtroNome');

        // Adiciona um ouvinte de eventos de entrada para o campo de entrada
        filtroNomeInput.addEventListener('input', () => {
            const filtroNome = filtroNomeInput.value.toLowerCase();
            const cards = document.querySelectorAll('.card');

            // Itera pelos cards e oculta/mostra com base no nome da vaga
            cards.forEach((card) => {
                const tituloVaga = card.querySelector('.card-title').textContent.toLowerCase();
                if (tituloVaga.includes(filtroNome)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>

</x-app-layout>