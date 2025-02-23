@error($name)
    <div class="text-red-800">
        {{ $errors->first($name) }}
    </div>
@enderror
