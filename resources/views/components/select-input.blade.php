@props([
    'name' => 'role',
    'selected' => null,
    'options' => ['admin' => 'Admin', 'agent' => 'Agent'],
])

<label for="{{ $name }}" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
    {{ ucfirst($name) }}
</label>

<select name="{{ $name }}" id="{{ $name }}"
    {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full']) }}>
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" @selected(old($name, $selected) === $value)>
            {{ $label }}
        </option>
    @endforeach
</select>
