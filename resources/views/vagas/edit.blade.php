<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <form method="post" action="{{route('vagas.update', $vaga)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <x-input-label for="tituloVaga">Titulo da Vaga</x-input-label>
                    <x-text-input type="text" class="form-control" id="tituloVaga" name="tituloVaga" placeholder="Titulo do Vaga" value="{{$vaga->tituloVaga}}" />
                    <x-input-error :messages="$errors->get('tituloVaga')" class="mt-2" />

                    <br>

                    <x-input-label for="descricaoVaga">Descrição da Vaga</x-input-label>
                    <textarea id="descricaoVaga" class="block mt-1 w-full" type="text" name="descricaoVaga" :value="old('descricaoVaga')" required autocomplete="descricaoVaga">{{$vaga->descricaoVaga}}</textarea>
                    <x-input-error :messages="$errors->get('descricaoVaga')" class="mt-2" />

                    <br>

                    <x-input-label for="salarioVaga">Salario da Vaga</x-input-label>
                    <x-text-input type="number" class="form-control" id="salarioVaga" name="salarioVaga" placeholder="Salario do Vaga" value="{{$vaga->salarioVaga}}" />
                    <x-input-error :messages="$errors->get('salarioVaga')" class="mt-2" />

                    <br>

                    <x-input-label for="localVaga">Local da Vaga</x-input-label>
                    <x-text-input type="text" class="form-control" id="localVaga" name="localVaga" placeholder="Local do Vaga" value="{{$vaga->localVaga}}" />
                    <x-input-error :messages="$errors->get('localVaga')" class="mt-2" />

                    <br>

                    <x-input-label for="periodoVaga">Periodo da Vaga</x-input-label>
                    <x-text-input type="text" class="form-control" id="periodoVaga" name="periodoVaga" placeholder="Periodo do Vaga" value="{{$vaga->periodoVaga}}" />
                    <x-input-error :messages="$errors->get('periodoVaga')" class="mt-2" />

                    <br>

                    <x-input-label for="empresa_id">Empresa</x-input-label>
                    <select name="empresa_id" id="empresa_id" class="form-control">
                        <option value="">Selecione</option>
                        @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}" <?php if ($vaga->empresa_id == $empresa->id) echo "selected"; ?>>{{$empresa->nomeEmpresa}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('empresa_id')" class="mt-2" />

                    <br>

                    <x-input-label for="curso_id">Curso</x-input-label>
                    <select class="select_" name="curso_id">
                        <option value="">Selecione</option>
                        @foreach($cursos as $curso)
                        <option value="{{$curso->id}}" <?php if ($vaga->curso_id == $curso->id) echo "selected"; ?>>{{$curso->nomeCurso}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('curso_id')" class="mt-2" />
                </div>

                <br>

                <button class="btn  bg-green-800 text-white hover:bg-green-700">Editar</button>
                <button class="btn  btn-secondary">
                    <a href="{{route('vagas.index')}}">Cancelar</a>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>