<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold tracking-tight text-white">
            Mis tareas
        </h2>
        <p class="mt-2 text-sm text-gray-300">
            Organiza tus tareas de forma rápida y visual.
        </p>
    </x-slot>

    <div class="min-h-screen bg-gray-950 py-8 text-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 text-white">

            <div class="mb-6 flex justify-end">
                <a href="{{ route('tasks.create') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-blue-600 px-6 py-3 text-sm font-extrabold text-white shadow-lg shadow-blue-950/40 transition duration-200 hover:scale-105 hover:bg-blue-500">
                    + Nueva tarea
                </a>
            </div>

            <div class="overflow-hidden rounded-3xl bg-gray-900 shadow-2xl shadow-black/40 text-white">
                <div class="p-6 text-white">
                    @if($tasks->count())
                        <div class="overflow-x-auto text-white">
                            <table class="min-w-full text-white">
                                <thead>
                                    <tr class="bg-gray-800">
                                        <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider text-white">Título</th>
                                        <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider text-white">Descripción</th>
                                        <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider text-white">Estado</th>
                                        <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider text-white">Fecha límite</th>
                                        <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider text-white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach($tasks as $task)
                                        <tr class="border-t border-gray-800 transition hover:bg-gray-800/60 text-white">
                                            <td class="px-4 py-4 text-sm font-semibold text-white">
                                                {{ $task->title }}
                                            </td>

                                            <td class="px-4 py-4 text-sm text-white">
                                                {{ $task->description ?: '-' }}
                                            </td>

                                            <td class="px-4 py-4 text-sm text-white">
                                                @if($task->status === 'pending')
                                                    <span class="inline-flex rounded-full bg-yellow-500/20 px-3 py-1 text-xs font-bold text-yellow-300">
                                                        Pendiente
                                                    </span>
                                                @elseif($task->status === 'in_progress')
                                                    <span class="inline-flex rounded-full bg-sky-500/20 px-3 py-1 text-xs font-bold text-sky-300">
                                                        En progreso
                                                    </span>
                                                @else
                                                    <span class="inline-flex rounded-full bg-emerald-500/20 px-3 py-1 text-xs font-bold text-emerald-300">
                                                        Completada
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="px-4 py-4 text-sm text-white">
                                                {{ $task->due_date ?? '-' }}
                                            </td>

                                            <td class="px-4 py-4 text-white">
                                                <div class="flex flex-wrap gap-3">
                                                    <a href="{{ route('tasks.edit', $task) }}"
                                                       class="inline-flex items-center justify-center rounded-2xl bg-amber-500 px-5 py-2.5 text-sm font-extrabold text-white shadow-lg shadow-amber-950/40 transition duration-200 hover:scale-105 hover:bg-amber-400">
                                                        Editar
                                                    </a>

                                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta tarea?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center justify-center rounded-2xl bg-red-600 px-5 py-2.5 text-sm font-extrabold text-white shadow-lg shadow-red-950/40 transition duration-200 hover:scale-105 hover:bg-red-500">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="rounded-3xl bg-gray-900 p-10 text-center text-white">
                            <h3 class="text-2xl font-bold text-white">
                                No tienes tareas todavía
                            </h3>
                            <p class="mt-3 text-gray-300">
                                Crea tu primera tarea para empezar a organizarte mejor.
                            </p>

                            <a href="{{ route('tasks.create') }}"
                               class="mt-6 inline-flex items-center justify-center rounded-2xl bg-violet-600 px-6 py-3 text-sm font-extrabold text-white shadow-lg shadow-violet-950/40 transition duration-200 hover:scale-105 hover:bg-violet-500">
                                Crear primera tarea
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>