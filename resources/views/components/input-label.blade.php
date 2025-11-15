@props(['value'])

<label {{ $attributes->merge(['class' => 'block  text-sm text-black']) }}>
    {{ $value ?? $slot }}
</label>
