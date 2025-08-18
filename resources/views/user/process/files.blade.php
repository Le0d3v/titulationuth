<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Universidad Tecnológica de Huejotzingo') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900 text-center text-3xl font-bold py-3 opacity-100">
                    {{ __("Mis Archivos") }}
                    <p class="text-center mt-1 text-gray-400 text-sm font-bold">
                        Expediente de archivos de Titulación
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
