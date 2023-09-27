<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDITAR PROJETO') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $project->name}}
                        @if (session('success'))
                            <div class="alert alert-primary" role="alert">
                                {{session('success')}}
                            </div>
                        @endif

                    </h2>
                    <form method="POST" action="{{ route('projects.update',['project' => $project->id]) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="name" :value="__('Nome do Projeto')" />
                            <x-text-input id="name" value="{{ $project->name}}" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Descrição')" />
                            <x-text-input value="{{ $project->description}}" id="description" class="block mt-1 w-full" type="text" name="description" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <select name="status" class="form-select form-select-sm" aria-label="Small select example">
                                <option value="1" @if($project->status == 1) selected @endif >Concluido</option>
                                <option value="2" @if($project->status == 2) selected @endif >Em Andamento</option>
                                <option value="3" @if($project->status == 3) selected @endif >Aguardando</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button class="ml-1">
                                {{ __('Atualizar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
