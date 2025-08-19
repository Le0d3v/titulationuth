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
                                <div class="mt-5 border-2 rounded border-dashed border-gray-400 p-5">
                                    @if (!$data->process->image_titulation_url)
                                        <p class="text-gray-400 text-center p-5">
                                            Sin imágenes aún 
                                        </p>
                                    @elseif($data->process->image_titulation_url)
                                        <div class="flex justify-center">
                                            <img src="{{asset("img/uploads/pictures/" . $data->process->image_titulation_url)}}" alt="" width="250">
                                        </div>
                                        <div class="mt-5 flex justify-center">
                                            <div class="flex gap-5">
                                                <a href="{{route("image.donwload", $data->process_id)}}" class="p-2 rounded bg-blue-400 text-white text-bold hover:bg-blue-600">
                                                    Descargar
                                                </a>
                                                <a href="" class="p-2 rounded bg-red-400 text-white text-bold hover:bg-red-600">
                                                    Eliminar
                                                </a>
                                            </div>
                                        </div>
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
                                                required
                                            >
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg shadow bg-gray-50 p-5 mt-10">
                        <legend class="font-bold text-green-400 text-3xl mb-2">
                            Compbroante de Donación por Inmobiliaria (PDF)
                        </legend>
                        <div class="flex gap-16 items-center">
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    PDF Actual
                                </h1>
                                <div class="mt-5 border-2 rounded border-dashed border-gray-400 p-5">
                                    @if (!$data->process->image_donation_url)
                                        <p class="text-gray-400 text-center p-5">
                                            Sin Archivos Aún
                                        </p>
                                    @elseif($data->process->image_donation_url)
                                        <div class="">
                                            <div>
                                                <div class="flex justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-12">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                           <p class="mt-1 text-center">
                                                {{$data->process->image_donation_url}}
                                           </p>
                                        </div>
                                        <div class="mt-5 flex justify-center">
                                            <div class="flex gap-5">
                                                <a href="{{route("pdf.donwload", $data->process_id)}}" class="p-2 rounded bg-blue-400 text-white text-bold hover:bg-blue-600">
                                                    Descargar
                                                </a>
                                                <a href="" class="p-2 rounded bg-red-400 text-white text-bold hover:bg-red-600">
                                                    Eliminar
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    Cargar Archivo
                                </h1>
                                <div class="mt-5 shadow-lg rounded p-5">
                                    <form 
                                        action="{{route("pdf.store")}}" 
                                        method="post" 
                                        enctype="multipart/form-data"
                                    >
                                        @csrf
                                        <label for="donation_pdf" class="text-sm text-gray-500 font-bold block">
                                            Archivo aquí (.pdf)
                                        </label>
                                        <div class="p-3 bg-gray-100 rounded mt-3">
                                            <input type="file" id="donation_pdf" name="donation_pdf" accept="application/pdf">
                                        </div>
                                        <div class="flex justify-end mt-5">
                                            <input 
                                                type="submit" 
                                                value="Subir PDF" 
                                                class="p-2 bg-green-500 text-white rounded hover:cursor-pointer hover:bg-green-700"
                                                required
                                            >
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg shadow bg-gray-50 p-5 mt-10">
                        <legend class="font-bold text-green-400 text-3xl mb-2">
                            Referencia de Pago de Titulo Universitario
                        </legend>
                        <div class="flex gap-16 items-center">
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    Referencia Actual
                                </h1>
                                <div class="mt-5 border-2 rounded border-dashed border-gray-400 p-5">
                                    @if (!$data->process->image_tittle_url)
                                        <p class="text-gray-400 text-center p-5">
                                            Sin Referencia Registrada
                                        </p>
                                        @elseif($data->process->image_tittle_url)
                                        <div class="flex justify-center">
                                            <p class="text-blue-400 text-center p-5 font-bold text-xl">
                                                {{$data->process->image_tittle_url}}
                                            </p>
                                        </div>
                                        <div class="mt-2 flex justify-center">
                                            <div class="flex justify-center">
                                                <a href="" class="p-2 rounded bg-red-400 text-white text-bold hover:bg-red-600">
                                                    Eliminar Referencia
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    Registrar Referencia
                                </h1>
                                <div class="mt-5 shadow-lg rounded p-5">
                                    <form 
                                        action="{{route("reference.store")}}" 
                                        method="post" 
                                    >
                                        @csrf
                                        <label for="reference" class="text-sm text-gray-500 font-bold block">
                                            Referencia de Pago
                                        </label>
                                        <div class="p-3 bg-gray-100 rounded mt-3">
                                            <input type="text" id="reference" name="reference" class="p-1 w-full rounded bg-blue-400 text-white">
                                        </div>
                                        <div class="flex justify-end mt-5">
                                            <input 
                                                type="submit" 
                                                value="Enviar Referencia" 
                                                class="p-2 bg-green-500 text-white rounded hover:cursor-pointer hover:bg-green-700"
                                                required
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
