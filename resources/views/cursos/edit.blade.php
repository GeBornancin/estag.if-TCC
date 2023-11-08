<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{route('cursos.update', $curso)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nomeCurso">Nome do Curso</label>
                    <input type="text" class="form-control" id="nomeCurso" name="nomeCurso" placeholder="Nome do Curso" value="{{$curso->nomeCurso}}">
                </div>    
                <button class="btn btn-primary">Editar</button>
                <button class="btn btn-danger">
                    <a href="{{route('cursos.index')}}">Voltar</a>
                </button>   
            </form>
        </div>
    </div>
</x-app-layout>