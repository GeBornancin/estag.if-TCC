<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Cadastrar Curso') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">

            <form method="post" action="{{route('cursos.store')}}">
                @csrf
                <div class="form-group">
                    <x-input-label for="nomeCurso">Nome do Curso</x-input-label>
                    <x-text-input type="text" class="form-control" id="nomeCurso" name="nomeCurso" placeholder="Nome do Curso"/>    
                </div>
                
                <button class="btn  btn-success">Criar</button>
                <button class="btn  btn-danger">
                    <a href="{{route('cursos.index')}}">Cancelar</a>
                </button>
            </form>

        </div>

    </div>

</x-app-layout>