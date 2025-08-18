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
                    {{ __(" Validación de Datos Personales") }}
                    <p class="text-center mt-1 text-gray-400 text-sm font-bold">
                        Verifica que tus datos personales estén correctos. Para validar que tus datos son correctos da clic al botón al final del formulario
                    </p>
                </div>
                <div class="mt-1 px-5">
                    <form 
                        action="{{route("dataValidation.store")}}"
                        method="POST"
                        class="p-5"
                    >
                        @csrf
                        <div class="rounded-lg shadow bg-gray-50 p-5">
                            <div class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-9">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                <legend class="font-bold text-green-400 text-3xl mb-2">
                                    Datos Personales
                                </legend>
                            </div>
                            <div class="flex gap-5 mt-5">
                                <div class="w-full">
                                    <label for="name" class="text-sm text-gray-500 font-bold">
                                        Nombre
                                    </label>
                                    <input type="text" name="name" id="name" value="{{$data->user->name ?? old("name")}}" class="p-2 rounded w-full bg-gray-200 font-bold">
                                </div>
                                <div class="w-full">
                                    <label for="curp" class="text-sm text-gray-500 font-bold">
                                        CURP
                                    </label>
                                    <input type="text" name="curp" id="curp" value="{{$data->user->curp ?? old("curp")}}" class="p-2 rounded w-full bg-gray-200 font-bold">
                                </div>
                                <div class="w-full">
                                    <label for="rfc" class="text-sm text-gray-500 font-bold">
                                        RFC
                                    </label>
                                    <input type="text" name="rfc" id="rfc" value="{{$data->user->rfc ?? old("rfc")}}" class="p-2 rounded w-full bg-gray-200 font-bold">
                                </div>
                            </div>
                            <div class="mt-5 flex gap-5 items-center">
                                <div class="">
                                    <label for="born_date" class="text-sm text-gray-500 font-bold">
                                        Fecha de Nacimiento
                                    </label>
                                    <input type="date" name="born_date" id="born_date" value="{{$data->user->born_date ?? old("born_date")}}" class="p-2 rounded w-full bg-gray-200 font-bold">
                                </div>
                                <div>
                                    <label for="gener" class="text-sm text-gray-500 font-bold w-full block">
                                        Genero
                                    </label>
                                    <select name="gener" id="gener" class="rounded bg-gray-200">
                                        <option value="0" disabled selected class="p-1 rounded bg-blue-400 text-white font-bold">
                                            -- Seleccione --
                                        </option>
                                        <option value="M" class="p-1 rounded bg-blue-400 text-white font-bold" {{$data->user->gener == "M" ? "selected" : ""}}>
                                            Masculino
                                        </option>
                                        <option value="F" class="p-1 rounded bg-blue-400 text-white font-bold" {{$data->user->gener == "F" ? "selected" : ""}}>
                                            Femenino
                                        </option>
                                    </select>
                                </div>
                                <div>
                                    <label for="civil_state" class="text-sm text-gray-500 font-bold w-full block">
                                        Estado Civil
                                    </label>
                                    <select name="civil_state" id="civil_state" class="rounded bg-gray-200">
                                        <option value="0" disabled selected class="p-1 rounded bg-blue-400 text-white font-bold">
                                            -- Seleccione --
                                        </option>
                                        <option value="Soltero" class="p-1 rounded bg-blue-400 text-white font-bold" {{$data->user->civil_state == "Soltero" ? "selected" : ""}}>
                                            Soltero
                                        </option>
                                        <option value="Casado" class="p-1 rounded bg-blue-400 text-white font-bold" {{$data->user->civil_state == "Casado" ? "selected" : ""}}>
                                            Casado
                                        </option>
                                        <option value="Divorciado" class="p-1 rounded bg-blue-400 text-white font-bold" {{$data->user->civil_state == "Divorciado" ? "selected" : ""}}>
                                            Divorsiado
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-7 rounded-lg shadow bg-gray-50 p-5">
                            <div class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-9">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <legend class="font-bold text-green-400 text-3xl mb-2">
                                    Datos de Contacto
                                </legend>
                            </div>
                            <div class="mt-5 flex gap-5">
                                <div>
                                    <label for="telephone" class="text-sm text-gray-500 font-bold">
                                        Número de Teléfono
                                    </label>
                                    <input type="tel" name="telephone" id="telephone" value="{{$data->user->telephone ?? old("telephone")}}" class="p-2 rounded w-full bg-gray-200 font-bold">
                                </div>
                                <div>
                                    <label for="email" class="text-sm text-gray-500 font-bold">
                                        Correo Electrónico
                                    </label>
                                    <input type="email" name="email" id="email" value="{{$data->user->email ?? old("email")}}" class="p-2 rounded w-full bg-gray-200 font-bold">
                                </div>
                            </div>
                        </div>
                        <div class="mt-7 rounded-lg shadow bg-gray-50 p-5">
                            <div class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-9">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                                <legend class="font-bold text-green-400 text-3xl mb-2">
                                    Datos Académicos
                                </legend>
                            </div>
                            <div class="mt-5 flex gap-5">
                                <div>
                                    <label for="tuition" class="text-sm text-gray-500 font-bold">
                                        Matricula
                                    </label>
                                    <input type="text" name="tuition" id="tuition" value="{{$data->user->tuition ?? old("tuition")}}" class="p-2 rounded w-full bg-gray-200 font-bold hover:cursor-not-allowed" disabled>
                                </div>
                                <div>
                                    <label for="career" class="text-sm text-gray-500 font-bold">
                                        Carrera
                                    </label>
                                    <input type="career" name="career" id="career" value="{{$data->career ?? old("career")}}" class="p-2 rounded w-full bg-gray-200 font-bold hover:cursor-not-allowed" disabled>
                                </div>
                                <div>
                                    <label for="specialty" class="text-sm text-gray-500 font-bold">
                                        Especialidad
                                    </label>
                                    <input type="specialty" name="specialty" id="specialty" value="{{$data->specialty ?? old("specialty")}}" class="p-2 rounded w-full bg-gray-200 font-bold hover:cursor-not-allowed" disabled>
                                </div>
                                <div>
                                    <label for="semester" class="text-sm text-gray-500 font-bold">
                                        Cuatrimestre
                                    </label>
                                    <input type="text" name="semester" id="semester" value="{{$data->semester ?? old("semester")}}" class="p-2 rounded w-full bg-gray-200 font-bold hover:cursor-not-allowed" disabled>
                                </div>
                            </div>
                            <div class="mt-3 w-64">
                                <label for="shift" class="text-sm text-gray-500 font-bold mt-5">
                                    Turno
                                </label>
                                <input type="text" name="shift" id="shift" value="{{$data->shift ?? old("shift")}}" class="p-2 rounded w-full bg-gray-200 font-bold hover:cursor-not-allowed" disabled>
                            </div>
                        </div>
                        <div class="flex mt-3 justify-end p-5">
                            <input type="submit" value="Guardar Datos" class="p-2 rounded bg-green-500 text-white font-bold hover:bg-green-700 hover:cursor-pointer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
