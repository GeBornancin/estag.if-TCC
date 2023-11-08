<head>
    <meta charset="utf-8">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empresas') }}
        </h2>
    </x-slot>
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                    <x-text-input type="text" class="form-control" id="filtroNome" placeholder="Filtrar empresa por nome"  />
            </div>


            @if(Auth::check())
                <div style="margin-bottom:2%">
                    <button type="button" class="btn btn-outline-primary">
                        <a href="{{route('empresas.create')}}">Criar Empresa</a>
                    </button>
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Nome da Empresa</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($empresas as $empresa)
                    
                    <tr class="empresa-row {{ $empresa->statusEmpresa ? 'bg-green-100' : 'bg-pink-100' }}">
                            <th scope="row">{{$empresa->id}}</th>
                            <td>{{$empresa->nomeEmpresa}}</td>
                            <td>
                                @if($empresa->statusEmpresa == true)
                                    <span class="badge badge-success">Ativo</span>
                                @else
                                    <span class="badge badge-danger">Inativo</span>
                                @endif
                            </td>

                            <td>

                                <div style="display:flex">
                                    @auth
                                        @can('delete', $empresa)
                                        <div style="margin-right:2%;">
                                            <form method="post" action=" {{ route('empresas.destroy', $empresa) }} "
                                                onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($empresa->titulo) }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                        @endcan

                                        @can('update', $empresa)
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-success">
                                                    <a href="{{ route('empresas.edit', $empresa) }}">Editar</a>
                                                </button>
                                            </div>
                                        @endcan

                                        @can('view', $empresa)
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-info">
                                                    <a href="{{ route('empresas.show', $empresa) }}">Visualizar</a>
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
        const linhas = document.querySelectorAll('.empresa-row');

        // Itera pelas linhas e oculta/mostra com base no nome da empresa
        linhas.forEach((linha) => {
            const nomeEmpresa = linha.querySelector('td').textContent.toLowerCase();
            if (nomeEmpresa.includes(filtroNome)) {
                linha.style.display = 'table-row';
            } else {
                linha.style.display = 'none';
            }
        });
    });
</script>

</x-app-layout>
