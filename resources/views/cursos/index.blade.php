<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::check())
                <div style="margin-bottom:2%">
                    <button type="button" class="btn btn-outline-primary">
                        <a href="{{route('cursos.create')}}">Criar Curso</a>
                    </button>
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Nome do Curso</th>
<<<<<<< HEAD
                        <th scope="col">Ações</th>
=======
>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017
                    </tr>
                </thead>

                <tbody>
                    @foreach($cursos as $curso)
                        <tr>
                            <th scope="row">{{$curso->id}}</th>
                            <td>{{$curso->nomeCurso}}</td>
                            <td>

                                <div style="display:flex">
                                    @auth
                                        @can('delete', $curso)
                                        <div style="margin-right:2%;">
                                            <form method="post" action=" {{ route('cursos.destroy', $curso) }} "
                                                onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($curso->titulo) }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                        @endcan

                                        @can('update', $curso)
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-success">
                                                    <a href="{{ route('cursos.edit', $curso) }}">Editar</a>
                                                </button>
                                            </div>
                                        @endcan

                                        @can('view', $curso)
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-info">
                                                    <a href="{{ route('cursos.show', $curso) }}">Visualizar</a>
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