<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CRIAR PROJETO') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        @if (session('success'))
                            <div class="alert alert-primary" role="alert">
                                {{session('success')}}
                            </div>
                        @elseif (session('denied'))
                        <div class="alert alert-danger" role="alert">
                            {{session('denied')}}
                        </div>
                        @endif
                    </h2>
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="nome" :value="__('Nome do Projeto')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="old('descricao')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <select name="status" class="form-select form-select-sm" aria-label="Small select example">
                                <option selected>Selecione uma opção</option>
                                <option value="1">Concluido</option>
                                <option value="2">Em Andamento</option>
                                <option value="3">Aguardando</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button class="ml-1">
                                {{ __('Registrar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
