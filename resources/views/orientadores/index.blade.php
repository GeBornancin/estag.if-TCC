<head>
    <meta charset="utf-8">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Orientadores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-3">
                <x-text-input type="text" class="form-control" id="filtroNome" placeholder="Filtrar orientador por nome"  />
            </div>

            @if(Auth::check())
                <div style="margin-bottom: 2%">
                    <button type="button" class="btn btn-outline-primary">
                        <a href="{{route('orientadores.create')}}">Criar Orientador</a>
                    </button>
                </div>
            @endif

            <table class="table align-middle caption-top table-striped">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Nome do Orientador</th>
                        <th scope="col">Status do Orientador</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orientadores as $orientador)
                        <tr class="orientador-row">
                            <th scope="row">{{$orientador->id}}</th>
                            <td scope="row">{{$orientador->nomeOrientador}}</td>
                            <td scope="row">
                                @if($orientador->statusOrientador == true)
                                    <span class="badge badge-success">Ativo</span>
                                @else
                                    <span class="badge badge-danger">Inativo</span>
                                @endif
                            </td>
                            <td scope="row">{{$orientador->curso->nomeCurso}}</td>
                            <td scope="row">
                                <div style="display:flex">
                                    @auth
                                        @can('delete', $orientador)
                                        <div style="margin-right:2%;">
                                            <form method="post" action=" {{ route('orientadores.destroy', $orientador) }} "
                                                onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($orientador->nomeOrientador) }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                        @endcan

                                        @can('update', $orientador)
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-success">
                                                    <a href="{{ route('orientadores.edit', $orientador) }}">Editar</a>
                                                </button>
                                            </div>
                                        @endcan
                                    @endauth
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Captura o campo de entrada
        const filtroNomeInput = document.getElementById('filtroNome');

        // Adiciona um ouvinte de eventos de entrada para o campo de entrada
        filtroNomeInput.addEventListener('input', () => {
            const filtroNome = filtroNomeInput.value.toLowerCase();
            const linhas = document.querySelectorAll('.orientador-row');

            // Itera pelas linhas e oculta/mostra com base no nome da orientador
            linhas.forEach((linha) => {
                const nomeOrientador = linha.querySelector('td').textContent.toLowerCase();
                if (nomeOrientador.includes(filtroNome)) {
                    linha.style.display = 'table-row';
                } else {
                    linha.style.display = 'none';
                }
            });
        });
    </script>

</x-app-layout> 