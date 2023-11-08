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
    
       
        .container{
            display: flex; 
            margin: 0 auto;
            justify-content: center; 
            align-items: center; 
            width: 300px; 
            position: absolute;
            max-width: 300px;
            
            
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
            height: 80px;
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
       
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Encontre sua vaga de estágio') }}
        </h2>
    </x-slot>
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                    <x-text-input type="text" class="form-control" id="filtroNome" placeholder="Filtrar vagas por nome"  />
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
                    <div class="card">
                        <div class="card-header">
                            {{$vaga->tituloVaga}}
                        </div>
                        <div class="card-body">
                            Empresa:
                            {{$vaga->empresa->nomeEmpresa}}
                            <br>
                            Endereço:
                            {{ $vaga->localVaga }}
                            <br>
                            Periodo:
                            {{ $vaga->periodoVaga }}
                            <br>
                            Curso:
                            {{ $vaga->curso->nomeCurso}}
                        </div>
                        <div class="card-footer">
                            <div style="display:flex">
                                @auth
                                    @can('delete', $vaga)
                                    <div style="margin-right:2%;">
                                        <form method="post" action=" {{ route('vagas.destroy', $vaga) }} "
                                            onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($vaga->titulo) }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                    @endcan

                                    @can('update', $vaga)
                                        <div style="margin-right:2%;">
                                            <button type="button" class="btn btn-outline-success">
                                                <a href="{{ route('vagas.edit', $vaga) }}">Editar</a>
                                            </button>
                                        </div>
                                    @endcan

                                    @can('view', $vaga)
                                        <div style="margin-right:2%;">
                                            <button type="button" class="btn btn-outline-info">
                                                <a href="{{ route('vagas.show', $vaga) }}">Informações</a>
                                            </button>
                                        </div>
                                    @endcan
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
            const linhas = document.querySelectorAll('.vaga-row');

            // Itera pelas linhas e oculta/mostra com base no nome da empresa
            linhas.forEach((linha) => {
                const tituloVaga = linha.querySelector('td').textContent.toLowerCase();
                if (tituloVaga.includes(filtroNome)) {
                    linha.style.display = 'table-row';
                } else {
                    linha.style.display = 'none';
                }
            });
        });
    </script>

</x-app-layout>
