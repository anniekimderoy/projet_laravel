<x-layout titre="Modifiez une note">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="text-center">
            <span class="material-icons mx-auto h-10 w-auto text-indigo-600  text-8xl">
                assignment
            </span>
            <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-800">Modifiez une séance de notes de cours</h2>
        </div>

        @if (session('erreur'))
            <p class="absolute z-50 top-4 right-4 bg-red-900 text-white mx-auto p-2 rounded-md">
                {{ session('erreur') }}
            </p>
        @endif

        <div class="mt-10 mx-auto w-full max-w-4xl">
            <form class="space-y-6" action="{{ route('notes.update')}}" method="POST">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $note->id }}">

                {{-- TITRE --}}
                <div>
                    <label for="titre" class="block text-sm font-medium leading-6 text-gray-900">Titre</label>
                    <div class="mt-2">

                        <x-forms.erreur champ="titre" />

                        <input id="titre" name="titre" type="text" autofocus
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                            value="{{ old('titre') ?? $note->titre }}">
                    </div>
                </div>

                {{-- CATÉGORIES --}}
                <div>
                    <label
                        for="categorie"
                        class="block text-sm font-medium leading-6
                        @error('categorie') text-red-700 @enderror">
                            Catégorie
                    </label>

                    <x-forms.erreur champ="categorie_id" />

                    <div class="mt-2">
                        <select id="categorie" name="categorie_id"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                            @forelse ($categories as $categorie)
                                <option
                                    value="{{ $categorie->id }}"
                                    @if(old('categorie') == $categorie->id || $note->categorie_id == $categorie->id) selected @endif
                                >
                                    {{ $categorie->nom }}
                                </option>
                            @empty
                                <option disabled>Aucune catégorie</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                {{-- TEXTE --}}
                <div>
                    <label for="texte" class="block text-sm font-medium leading-6 text-gray-900">Texte</label>
                    <div class="mt-2">

                        <x-forms.erreur champ="texte" />

                        <textarea id="texte" name="texte" rows="10"
                            rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('texte', $note->texte) }}</textarea>
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div class="mt-2">
                    <input type="submit"
                        class="max-w-min m-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        value="Modifier!">
                </div>
            </form>

            {{-- RETOUR AUX NOTES --}}
            <p class="mt-10 text-center text-sm text-gray-500">
                <a href="{{ route('notes.index') }}" class="hover:text-indigo-600">Retour aux notes</a>
            </p>
        </div>
    </div>
</x-layout>
