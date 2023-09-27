<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PROJETOS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-semibold text-xl p-1 text-gray-800 leading-tight">
                    {{ __('Buscar projetos') }}
                </h2>
                <form action="{{ route('projects.index') }}" method="GET">
                    <div class="form-floating mb-3">
                        <input type="text" style="border: solid 1px;border-radius: 15px;" name="search" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Pesquise por Nome:</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Filtrar</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="ml-3 font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('PROJETOS') }}

                </h2>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col" style="display: flex; justify-content: end;">Opções</th>
                          </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{$project->name}}</th>
                            <td>
                                <div style="display: flex; justify-content: end;">
                                <a href="{{route('projects.edit',['project' => $project->id])}}">
                                    <button class="btn btn-outline-primary">
                                        Editar
                                    </button>
                                </a>
                                <form method="POST" action="{{route('projects.destroy',['project' => $project->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger">
                                        Remover
                                    </button>
                                </form>
                            </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
