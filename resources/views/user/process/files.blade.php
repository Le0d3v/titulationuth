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
                        Expediente de Archivos de Titulación
                    </p>
                </div>
                <div class="mt-1 px-5">
                    <div class="rounded-lg shadow bg-gray-50 p-5">
                        <legend class="font-bold text-green-400 text-3xl mb-2">
                            Imágen para Titulación 
                        </legend>
                        <div class="flex gap-16 items-center">
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    Imágen Actual
                                </h1>
                                <div class="mt-5 border-2 rounded border-dashed border-gray-400">
                                    @if (!$data->process->image_titulation_url)
                                        <p class="text-gray-400 text-center p-5">
                                            Sin imágenes aún 
                                        </p>
                                    @elseif($data->process->image_titulation_url)
                                        <img src="{{asset("img/uploads/pictures/" . $data->process->image_titulation_url)}}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    Cargar Imágen
                                </h1>
                                <div class="mt-5 shadow-lg rounded p-5">
                                    <form 
                                        action="{{route("image.store")}}" 
                                        method="post" 
                                        enctype="multipart/form-data"
                                    >
                                        @csrf
                                        <label for="image_titulation_url" class="text-sm text-gray-500 font-bold block">
                                            Imagen aquí
                                        </label>
                                        <div class="p-3 bg-gray-100 rounded mt-3">
                                            <input type="file" id="image_titulation_url" name="image_titulation_url" accept=".jpg, .jpeg">
                                        </div>
                                        <div class="flex justify-end mt-5">
                                            <input 
                                                type="submit" 
                                                value="Guardar Imágen" 
                                                class="p-2 bg-green-500 text-white rounded hover:cursor-pointer hover:bg-green-700"
                                            >
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
