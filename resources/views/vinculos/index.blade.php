<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vinculos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <x-text-input type="text" class="form-control" id="filtroNome" placeholder="Filtrar vinculo por nome de aluno" />
            </div>

            @if(Auth::check())
            <div style="margin-bottom:2%">
                <button type="button" class="btn btn-outline-primary">
                    <a href="{{route('vinculos.create')}}">Criar Vinculo</a>
                </button>
            </div>
            @endif

            <table class="table align-middle caption-top table-striped">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Nome do Aluno</th>
                        <th scope="col">Nome da Empresa</th>
                        <th scope="col">Status do Vinculo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($vinculos as $vinculo)
                        <tr class="vinculo-row">
                            <th scope="row">{{$vinculo->id}}</th>
                            <td scope="row">{{$vinculo->discente->nomeDiscente}}</td>
                            <td scope="row">{{$vinculo->empresa->nomeEmpresa}}</td>
                            <td scope="row">
                                @if($vinculo->statusVinculo == true)
                                <span class="badge badge-success">Ativo</span>
                                @else
                                <span class="badge badge-danger">Inativo</span>
                                @endif
                            </td>

                            <td scope="row">
                                <div style="display:flex">
                                    @auth
                                        @can('delete', $vinculo)
                                        <div style="margin-right:2%;">
                                            <form method="post" action=" {{ route('vinculos.destroy', $vinculo) }} " onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($vinculo->discente->nomeDiscente) }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                        @endcan

                                        @can('update', $vinculo)
                                        <div style="margin-right:2%;">
                                            <button type="button" class="btn btn-outline-success">
                                                <a href="{{route('vinculos.edit', $vinculo)}}">Editar</a>
                                            </button>
                                        </div>
                                        @endcan

                                        @can('view', $vinculo)
                                        <div style="margin-right:2%;">
                                            <button type="button" class="btn btn-outline-primary">
                                                <a href="{{route('vinculos.show', $vinculo)}}">Visualizar</a>
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
            const linhas = document.querySelectorAll('.vinculo-row');

            // Itera pelas linhas e oculta/mostra com base no nome do aluno
            linhas.forEach((linha) => {
                const nomeDiscente = linha.querySelector('td').textContent.toLowerCase();
                if (nomeDiscente.includes(filtroNome)) {
                    linha.style.display = 'table-row';
                } else {
                    linha.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>