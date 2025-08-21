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
                    {{ __("Mi Proceso") }}
                    <p class="text-center mt-1 text-gray-400 text-sm font-bold">
                        Revisa los distintos procesos en tu titulación
                    </p>
                </div>
                <div class="mt-3 px-20 flex justify-between w-full items-center gap-5">
                    <div>
                        <p class="">
                            Procesos Completados:
                            <span class="text-green-400 font-bold text-2xl">
                                {{count($completed_process)}}
                            </span>
                        </p>
                    </div>
                    <div class="w-96">
                        <p class="text-center text-sm mb-1">
                            Progreso Total:
                        </p>
                        <x-progress-bar :percentage="$progress"></x-progress-bar>
                    </div>
                    <div>
                        <p class="">
                            Procesos Pendientes:
                            <span class="text-yellow-400 font-bold text-2xl">
                                {{count($incompleted_process)}}
                            </span>
                        </p>
                    </div>
                </div>
                <div class="mt-3 p-5">
                    <table id="dataSchoolTable" class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-green-500 text-white">
                                <th class="px-4 py-2">Proceso</th>
                                <th class="px-4 py-2">Estado</th>
                                <th class="px-4 py-2">Comentarios</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="border-b-2 py-1">
                                <td class="text-center p-4">
                                    <p class="text-sm">
                                        {{"Validación de Datos personales"}}
                                    </p>
                                </td>
                                <td class="text-center p-4">
                                    @if ($data_user->process->data_validation == 0)
                                        <p class="p-1 rounded-lg bg-yellow-400 text-white font-bold">
                                            Pendiente
                                        </p>
                                    @elseif ($data_user->process->data_validation == 1)
                                        <p class="p-1 rounded-lg bg-green-500 text-white font-bold">
                                            Completado
                                        </p>
                                    @endif
                                </td>
                                <td class="text-center p-4">
                                    @if (!$data_user->process->data_validation)
                                        <p class="text-gray-400 text-sm">
                                            Sin Comentarios
                                        </p>
                                    @else
                                        <p class="text-sm">
                                            {{$data_user->process->data_validation}}
                                        </p>
                                    @endif
                                </td>
                               <td class="text-center p-4">
                                    <div>
                                        <a 
                                            href="{{route("dataValidation")}}" 
                                            class="p-1 rounded bg-blue-500 text-white font-bold hover:bg-blue-700 transition"
                                        >
                                            Validar Datos
                                        </a>
                                    </div>
                               </td>
                            </tr>
                            <tr class="border-b-2 py-1">
                                <td class="text-center p-4">
                                    <p class="text-sm">
                                        {{"Carga de Imágenes para Titulación"}}
                                    </p>
                                </td>
                                <td class="text-center p-4">
                                    @if ($data_user->process->images_upload == 0)
                                        <p class="p-1 rounded-lg bg-yellow-400 text-white font-bold">
                                            Pendiente
                                        </p>
                                    @elseif ($data_user->process->images_upload == 1)
                                        <p class="p-1 rounded-lg bg-green-500 text-white font-bold">
                                            Completado
                                        </p>
                                    @elseif ($data_user->process->images_upload == 2)
                                        <p class="p-1 rounded-lg bg-blue-500 text-white font-bold">
                                            En Revisión
                                        </p>
                                    @elseif ($data_user->process->images_upload == 3)
                                        <p class="p-1 rounded-lg bg-red-500 text-white font-bold">
                                            Rechazado
                                        </p>
                                    @endif
                                </td>
                                @if (!$data_user->process->donation_payment)
                                        <p class="text-gray-400 text-sm">
                                            Sin Comentarios
                                        </p>
                                    @else
                                        <p class="text-sm">
                                            {{$data_user->process->donation_payment}}
                                        </p>
                                    @endif
                               <td class="text-center p-4">
                                    <div>
                                        <a href="{{route("myFiles")}}" class="p-1 rounded bg-blue-500 text-white font-bold">
                                            Cargar Archivos
                                        </a>
                                    </div>
                               </td>
                            </tr>
                            <tr class="border-b-2 py-1">
                                <td class="text-center p-4">
                                    <p class="text-sm">
                                        {{"Comprobante de Pago por Donación de Inmobiliaria"}}
                                    </p>
                                </td>
                                <td class="text-center p-4">
                                   @if ($data_user->process->donation_payment == 0)
                                        <p class="p-1 rounded-lg bg-yellow-400 text-white font-bold">
                                            Pendiente
                                        </p>
                                    @elseif ($data_user->process->donation_payment == 1)
                                        <p class="p-1 rounded-lg bg-green-500 text-white font-bold">
                                            Completado
                                        </p>
                                    @elseif ($data_user->process->donation_payment == 2)
                                        <p class="p-1 rounded-lg bg-blue-500 text-white font-bold">
                                            En Revisión
                                        </p>
                                    @elseif ($data_user->process->donation_payment == 3)
                                        <p class="p-1 rounded-lg bg-red-500 text-white font-bold">
                                            Rechazado
                                        </p>
                                    @endif
                                </td>
                                <td class="text-center p-4">
                                    <p class="text-sm">
                                        Comprobante equivocado
                                    </p>
                                </td>
                               <td class="text-center p-4">
                                    <div>
                                        <a href="{{route("myFiles")}}" class="p-1 rounded bg-blue-500 text-white font-bold">
                                            Cargar Archivos
                                        </a>
                                    </div>
                               </td>
                            </tr>
                            <tr class="border-b-2 py-1">
                                <td class="text-center p-4">
                                    <p class="text-sm">
                                        {{"Referencia de Titulo Universitario"}}
                                    </p>
                                </td>
                                <td class="text-center p-4">
                                    @if ($data_user->process->tittle_payment == 0)
                                        <p class="p-1 rounded-lg bg-yellow-400 text-white font-bold">
                                            Pendiente
                                        </p>
                                    @elseif ($data_user->process->tittle_payment == 1)
                                        <p class="p-1 rounded-lg bg-green-500 text-white font-bold">
                                            Completado
                                        </p>
                                    @elseif ($data_user->process->tittle_payment == 2)
                                        <p class="p-1 rounded-lg bg-blue-500 text-white font-bold">
                                            En Revisión
                                        </p>
                                    @elseif ($data_user->process->tittle_payment == 3)
                                        <p class="p-1 rounded-lg bg-red-500 text-white font-bold">
                                            Rechazado
                                        </p>
                                    @endif
                                </td>
                                <td class="text-center p-4">
                                    @if (!$data_user->process->tittle_payment)
                                        <p class="text-gray-400 text-sm">
                                            Sin Comentarios
                                        </p>
                                    @else
                                        <p class="text-sm">
                                            {{$data_user->process->tittle_payment}}
                                        </p>
                                    @endif
                                </td>
                               <td class="text-center p-4">
                                    <div>
                                        <a href="{{route("myFiles")}}" class="p-1 rounded bg-blue-500 text-white font-bold">
                                            Cargar Archivos
                                        </a>
                                    </div>
                               </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
