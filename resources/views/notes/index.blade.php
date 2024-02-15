<x-layout titre="Toutes les notes">
    <div class="w-full max-w-5xl mx-auto p-5">
        {{-- Entete --}}
        <header class="mb-8">
            <h1 class="text-3xl">Toutes les notes</h1>

            {{-- Avatar de l'utilisateur --}}
            @if(auth()->user()->avatar)
                <img class="w-20 h-20 object-cover my-2 rounded-full" src="{{ auth()->user()->avatar }}" alt="Avatar de {{ auth()->user()->prenom }} {{ auth()->user()->nom }}">
            @endif

            <p class="text-xs text-gray-500">
                Nombre de notes: {{ $notes->count() }}
            </p>

            <a href="{{ route('notes.create') }}" class="bg-indigo-500 text-white rounded-sm px-3 py-2 inline-block font-bold hover:bg-indigo-700">
                Créez une note de cours
            </a>

            <form action="{{ route('deconnexion') }}" method="POST">
                @csrf

                <input type="submit" value="Déconnexion" class="bg-indigo-500 text-white rounded-sm px-3 py-2 inline-block font-bold hover:bg-indigo-700">
            </form>
        </header> {{-- fin entête --}}

        {{-- Message de confirmaiton d'ajout d'une note --}}
        <x-alertes.succes cle="succes" />


        {{-- Principal --}}
        <main>
            @if($notes->isEmpty())
                <h2 class="text-2xl">
                    Aucune note actuellement
                </h2>
            @else
                {{-- Liste des notes de cours --}}
                <ul>
                    @foreach($notes as $note)
                        <li class="group flex justify-between border-b-2 border-indigo-200 hover:border-indigo-500 hover:bg-indigo-300 hover:text-white transition duration-300 ease-in-out px-4 py-2">
                            {{-- Lien vers une note de cours spécifique --}}
                            <a href="#">
                                <p class="text-sm w-fit bg-indigo-200 text-indigo-600 rounded-sm px-2 py-1 font-semibold">
                                    {{ $note->categorie->nom }}
                                </p>
                                <p>
                                    {{ $note->titre }}
                                </p>
                            </a>

                            <div class="opacity-0 group-hover:opacity-100 translate-x-full group-hover:translate-x-0 transition duration-300 ease-in-out">
                                <div>
                                    {{-- MODIFICATION --}}
                                    <a href="{{ route('notes.edit', ["id" => $note->id]) }}">
                                        <span class="material-icons bg-orange-400 hover:bg-orange-500 text-orange-200 rounded-md p-1">
                                            edit
                                        </span>
                                    </a>

                                    {{-- SUPPRESSION --}}
                                    <form action="{{ route('notes.destroy') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $note->id }}">
                                        <button type="submit">
                                            <span class="material-icons bg-red-500 hover:bg-red-600 text-red-100 rounded-md p-1">
                                                delete
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div> {{-- fin boutons --}}
                        </li>
                    @endforeach
                </ul>
            @endif
        </main> {{-- fin principal --}}
    </div>
</x-layout>
