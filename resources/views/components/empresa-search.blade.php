<div>
    <input wire:model="search" type="search" class="form-control" placeholder="Pesquisar empresa por nome">

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
            <tr class="{{ $empresa->statusEmpresa ? 'bg-green-100' : 'bg-pink-100' }}">
                <th scope="row">{{ $empresa->id }}</th>
                <td>{{ $empresa->nomeEmpresa }}</td>
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
                                <form method="post" action="{{ route('empresas.destroy', $empresa) }}" onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($empresa->titulo) }}?')">
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
