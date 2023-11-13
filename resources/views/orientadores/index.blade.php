<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Orientadores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                        <tr>
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

</x-app-layout> 