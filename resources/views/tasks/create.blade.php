<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold tracking-tight text-white">
            Crear tarea
        </h2>
        <p class="mt-2 text-sm text-gray-300">
            Añade una nueva tarea a tu lista personal.
        </p>
    </x-slot>

    <div class="min-h-screen bg-gray-950 py-8 text-white">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8 text-white">
            <div class="overflow-hidden rounded-3xl bg-gray-900 shadow-2xl shadow-black/40 text-white">
                <div class="p-8 text-white">

                    @if($errors->any())
                        <div class="mb-6 rounded-2xl bg-red-600/20 px-5 py-4 text-white shadow-lg shadow-red-950/30">
                            <ul class="list-disc pl-5 text-white">
                                @foreach($errors->all() as $error)
                                    <li class="text-white">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6 text-white">
                        @csrf

                        <div>
                            <label class="mb-2 block text-sm font-bold text-white">Título</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="w-full rounded-2xl bg-gray-800 px-4 py-3 text-white placeholder:text-gray-400 outline-none ring-1 ring-gray-700 transition focus:ring-2 focus:ring-cyan-500"
                                required>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold text-white">Descripción</label>
                            <textarea name="description" rows="4"
                                class="w-full rounded-2xl bg-gray-800 px-4 py-3 text-white placeholder:text-gray-400 outline-none ring-1 ring-gray-700 transition focus:ring-2 focus:ring-cyan-500">{{ old('description') }}</textarea>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold text-white">Estado</label>
                            <select name="status"
                                class="w-full rounded-2xl bg-gray-800 px-4 py-3 text-white outline-none ring-1 ring-gray-700 transition focus:ring-2 focus:ring-cyan-500">
                                <option value="pending">Pendiente</option>
                                <option value="in_progress">En progreso</option>
                                <option value="completed">Completada</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold text-white">Fecha límite</label>
                            <input type="date" name="due_date" value="{{ old('due_date') }}"
                                class="w-full rounded-2xl bg-gray-800 px-4 py-3 text-white outline-none ring-1 ring-gray-700 transition focus:ring-2 focus:ring-cyan-500">
                        </div>

                        <div class="flex flex-wrap gap-3 pt-2">
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-blue-600 via-cyan-500 to-sky-500 px-6 py-3 text-sm font-extrabold text-white shadow-xl shadow-cyan-950/40 transition duration-200 hover:scale-105 hover:from-blue-500 hover:via-cyan-400 hover:to-sky-400">
                                Guardar tarea
                            </button>

                            <a href="{{ route('tasks.index') }}"
                                class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-gray-700 via-gray-600 to-gray-500 px-6 py-3 text-sm font-extrabold text-white shadow-lg shadow-black/30 transition duration-200 hover:scale-105 hover:from-gray-600 hover:via-gray-500 hover:to-gray-400">
                                Volver
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>