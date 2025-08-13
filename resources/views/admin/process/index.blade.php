<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Universidad Tecnológica de Huejotzingo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-3 text-gray-900 w-full text-center font-bold text-3xl">
                    {{ __("Procesos de Titulación") }}
                </div>

                <div class="w-full flex justify-center items-center p-5 mt-1">
                    <div class="w-full p-3 shadow-md">
                        <h2 class="text-center font-bold text-green-400 text-2xl">
                            TSU
                        </h2>
                    </div>
                    <div class="w-full flex justify-center items-center p-5 mt-3">
                        <div class="w-full p-3 shadow-md">
                            <h2 class="text-center font-bold text-green-400 text-2xl">
                                Ingeniería
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>
