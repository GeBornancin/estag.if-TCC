<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informações do Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- conteudo -->

            <div>
                <h1>{{ $curso->nomeCurso }}</h1>
                
            </div>

            <br>
            <button class="btn btn-secondary">
                <a href="{{route('cursos.index')}}">Voltar</a>
            </button>
        
        

        <!-- conteudo -->
        </div>            
    </div>
</x-app-layout>