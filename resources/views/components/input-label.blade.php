@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-green-600 dark:text-green-300']) }}>
    {{ $value ?? $slot }}
</label>
