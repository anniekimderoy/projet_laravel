@props(["champ"])

@error($champ)
    <p class="text-sm text-red-700 italic">{{ $message }}</p>
@enderror
