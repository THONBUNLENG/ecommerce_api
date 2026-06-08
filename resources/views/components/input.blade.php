@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-[var(--border-med)] dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[var(--secondary)] focus:ring-[var(--secondary)] rounded-md shadow-sm']) !!}>