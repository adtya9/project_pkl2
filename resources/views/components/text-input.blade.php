@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'focus:border-transparent focus:ring-0']) }}>
