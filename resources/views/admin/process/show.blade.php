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
                    {{ __("Proceso de Titulación de: " . $data->user->name) }}
                </div>
                <p class="text-center text-sm text-gray-400">
                    Progreso Total
                </p>
                <div class="my-3 px-32">
                    <x-progress-bar :percentage="$data->process->getProgressPercentage2()"></x-progress-bar>
                </div>
                <h2 class="text-xl text-center font-bold text-green-400 mt-10 mb-5">
                    Procesos Realizados por el Estudiante
                </h2>
                <div class="mt-5 px-5">
                    <div class="rounded-lg shadow bg-gray-50 p-5">
                        <legend class="font-bold text-green-400 text-3xl mb-2">
                            Validación de Datos Personales (Realizado por el estudiante)
                        </legend>
                        <div class="flex gap-16 items-center">
                            <div class="w-full">
                                <p class="text-sm text-gray-400 font-bold mt-5">
                                    Estado del Proceso:
                                    @if ($data->process->data_validation == 0)
                                        <span class="p-1 rounded-lg bg-yellow-400 text-white font-bold">
                                            Pendiente
                                        </span>
                                    @elseif ($data->process->data_validation == 1)
                                        <span class="p-1 rounded-lg bg-green-500 text-white font-bold">
                                            Completado
                                        </span>
                                    @endif
                                </p>
                                <h1 class="text-center font-bold text-xl mt-3">
                                    Datos Del Estudiante
                                </h1>
                                <div class="mt-5 border-2 rounded border-dashed border-gray-400 p-5">
                                </div>
                            </div>
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    Enviar un Comentario (Opcional)
                                </h1>
                                <div class="mt-5 shadow-lg rounded p-5">
                                    <form 
                                        action="{{route("process.comentImage")}}" 
                                        method="post" 
                                    >
                                        @csrf
                                        <label for="image_coment" class="text-sm text-gray-500 font-bold block">
                                            Comentario:
                                        </label>
                                        <div class="p-2 bg-gray-100 rounded mt-3 w-full">
                                            <textarea name="image_coment" id="image_coment" class="rounded w-full h-20">
                                            </textarea>
                                            <input type="hidden" name="id" value="{{$data->process_id}}">
                                        </div>
                                        <div class="flex justify-end mt-5">
                                            <input 
                                                type="submit" 
                                                value="Enviar Comentarios" 
                                                class="p-2 bg-green-500 text-white rounded hover:cursor-pointer hover:bg-green-700"
                                                required
                                            >
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg shadow bg-gray-50 p-5">
                        <legend class="font-bold text-green-400 text-3xl mb-2">
                            Imágen para Titulación 
                        </legend>
                        <div class="flex gap-16 items-center">
                            <div class="w-full">
                                <p class="text-sm text-gray-400 font-bold mt-5">
                                    Estado del Proceso:
                                    @if ($data->process->images_upload == 0)
                                        <span class="p-1 rounded-lg bg-yellow-400 text-white font-bold">
                                            Pendiente
                                        </span>
                                    @elseif ($data->process->images_upload == 1)
                                        <span class="p-1 rounded-lg bg-green-500 text-white font-bold">
                                            Completado
                                        </span>
                                    @elseif ($data->process->images_upload == 2)
                                        <span class="p-1 rounded-lg bg-blue-500 text-white font-bold">
                                            En Revisión
                                        </span>
                                    @elseif ($data->process->images_upload == 3)
                                        <span class="p-1 rounded-lg bg-red-500 text-white font-bold">
                                            Rechazado
                                        </span>
                                    @endif
                                </p>
                                <h1 class="text-center font-bold text-xl mt-3">
                                    Imágen Enviada
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
                                        <p class="text-center text-gray-400 font-bold mt-5">
                                            Acciones:
                                        </p>
                                        <div class="mt-2 flex justify-center">
                                            <div class="flex gap-5">
                                                <a href="{{route("image.donwload", $data->process_id)}}" class="p-2 rounded bg-blue-400 text-white text-bold hover:bg-blue-600">
                                                    Descargar
                                                </a>
                                                <a 
                                                    href="{{route("process.aceptImage", $data->process_id)}}" 
                                                    class="p-2 rounded bg-green-400 text-white text-bold hover:bg-green-600"
                                                >
                                                    Aprobar
                                                </a>
                                                <a 
                                                    href="{{route("process.rejectImage", $data->process_id)}}" 
                                                    class="p-2 rounded bg-red-400 text-white text-bold hover:bg-red-600"
                                                >
                                                    Rechazar
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    Enviar un Comentario (Opcional)
                                </h1>
                                <div class="mt-5 shadow-lg rounded p-5">
                                    <form 
                                        action="{{route("process.comentImage")}}" 
                                        method="post" 
                                    >
                                        @csrf
                                        <label for="image_coment" class="text-sm text-gray-500 font-bold block">
                                            Comentario:
                                        </label>
                                        <div class="p-2 bg-gray-100 rounded mt-3 w-full">
                                            <textarea name="image_coment" id="image_coment" class="rounded w-full h-20">
                                            </textarea>
                                            <input type="hidden" name="id" value="{{$data->process_id}}">
                                        </div>
                                        <div class="flex justify-end mt-5">
                                            <input 
                                                type="submit" 
                                                value="Enviar Comentarios" 
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
                                <p class="text-sm text-gray-400 font-bold mt-5">
                                    Estado del Proceso:
                                    @if ($data->process->donation_payment == 0)
                                        <span class="p-1 rounded-lg bg-yellow-400 text-white font-bold">
                                            Pendiente
                                        </span>
                                    @elseif ($data->process->donation_payment == 1)
                                        <span class="p-1 rounded-lg bg-green-500 text-white font-bold">
                                            Completado
                                        </span>
                                    @elseif ($data->process->donation_payment == 2)
                                        <span class="p-1 rounded-lg bg-blue-500 text-white font-bold">
                                            En Revisión
                                        </span>
                                    @elseif ($data->process->donation_payment == 3)
                                        <span class="p-1 rounded-lg bg-red-500 text-white font-bold">
                                            Rechazado
                                        </span>
                                    @endif
                                </p>
                                <h1 class="text-center font-bold text-xl mt-3">
                                    PDF Subido
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
                                        <p class="text-center text-gray-400 font-bold mt-5">
                                            Acciones:
                                        </p>
                                        <div class="mt-5 flex justify-center">
                                            <div class="flex gap-5">
                                                <a href="{{route("pdf.donwload", $data->process_id)}}" class="p-2 rounded bg-blue-400 text-white text-bold hover:bg-blue-600">
                                                    Descargar
                                                </a>
                                                <a href="{{route("process.aceptDonation", $data->process_id)}}" class="p-2 rounded bg-green-400 text-white text-bold hover:bg-green-600">
                                                    Aprobar
                                                </a>
                                                <a href="{{route("process.rejectDonation", $data->process_id)}}" class="p-2 rounded bg-red-400 text-white text-bold hover:bg-red-600">
                                                    Rechazar
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    Enviar un Comentario (Opcional)
                                </h1>
                                <div class="mt-5 shadow-lg rounded p-5">
                                    <form 
                                        action="{{route("process.comentDonation")}}" 
                                        method="post" 
                                    >
                                        @csrf
                                        <label for="donation_coment" class="text-sm text-gray-500 font-bold block">
                                            Comentario:
                                        </label>
                                        <div class="p-2 bg-gray-100 rounded mt-3 w-full">
                                            <textarea name="donation_coment" id="donation_coment" class="rounded w-full h-20">
                                            </textarea>
                                            <input type="hidden" name="id" value="{{$data->process_id}}">
                                        </div>
                                        <div class="flex justify-end mt-5">
                                            <input 
                                                type="submit" 
                                                value="Enviar Comentario" 
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
                                <p class="text-sm text-gray-400 font-bold mt-5">
                                    Estado del Proceso:
                                    @if ($data->process->tittle_payment == 0)
                                        <span class="p-1 rounded-lg bg-yellow-400 text-white font-bold">
                                            Pendiente
                                        </span>
                                    @elseif ($data->process->tittle_payment == 1)
                                        <span class="p-1 rounded-lg bg-green-500 text-white font-bold">
                                            Completado
                                        </span>
                                    @elseif ($data->process->tittle_payment == 2)
                                        <span class="p-1 rounded-lg bg-blue-500 text-white font-bold">
                                            En Revisión
                                        </span>
                                    @elseif ($data->process->tittle_payment == 3)
                                        <span class="p-1 rounded-lg bg-red-500 text-white font-bold">
                                            Rechazado
                                        </span>
                                    @endif
                                </p>
                                <h1 class="text-center font-bold text-xl mt-3">
                                    Referencia Enviada
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
                                        <p class="text-center text-gray-400 font-bold mt-1">
                                            Acciones:
                                        </p>
                                        <div class="mt-2 flex justify-center">
                                            <div class="flex justify-center gap-5">
                                                <a href="{{route("process.aceptTittle", $data->process_id)}}" class="p-2 rounded bg-green-400 text-white text-bold hover:bg-green-600">
                                                    Aprobar
                                                </a>
                                                <a href="{{route("process.rejectTittle", $data->process_id)}}" class="p-2 rounded bg-red-400 text-white text-bold hover:bg-red-600">
                                                    Rechazar
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full">
                                <h1 class="text-center font-bold text-xl">
                                    Enviar Comentarios (Opcional)
                                </h1>
                                <div class="mt-5 shadow-lg rounded p-5">
                                    <form 
                                        action="{{route("process.comentTittle")}}" 
                                        method="post" 
                                    >
                                        @csrf
                                        <label for="tittle_coment" class="text-sm text-gray-500 font-bold block">
                                            Comentario
                                        </label>
                                        <div class="p-3 bg-gray-100 rounded mt-3">
                                            <textarea name="tittle_coment" id="tittle_coment" class="rounded w-full h-20">
                                            </textarea>
                                            <input type="hidden" name="id" value="{{$data->process_id}}">
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
