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
                        @endif
                    </h2>
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Nome do Projeto')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Descrição')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
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
