@php
    $alignClass = match ($getAlignment()) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };

    $state = $getState();
    $checkboxState = $getCheckboxState();
@endphp

<div

    x-data="{
        error: undefined,
        checkboxState: @js((bool) $checkboxState),
        state: @js($state),
        isLoading: false,
    }"

    x-init="Livewire.hook('message.processed', (component) => {
        if (component.component.id !== @js($this->id)) {
            return
        }

        if (!$refs.newState) {
            return
        }

        let newState = $refs.newState.value

        if (state === newState) {
            return
        }

        state = newState
    })">
    <div
        {{ $attributes->merge($getExtraAttributes())->class(['filament-tables-text-input-column']) }}>

        @if (!($isDisabled() ?? null))
            <input
                x-model="checkboxState"
                type="checkbox"
                x-tooltip.raw="Habilitar edição item"
                {{ $attributes->merge($getExtraInputAttributeBag()->getAttributes())->class([
                        'ml-4 text-primary-600 transition duration-75 rounded shadow-sm outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-500 disabled:opacity-70',
                        'dark:bg-gray-700 dark:checked:bg-primary-500' => config('forms.dark_mode'),
                    ]) }}
                x-bind:class="{
                    'opacity-70 pointer-events-none': isLoading,
                    'border-gray-300': !error,
                    'dark:border-gray-600': (!error) && @js(config('forms.dark_mode')),
                    'border-danger-600 ring-1 ring-inset ring-danger-600': error,
                }" />
        @endif

        <input
            type="hidden"
            value="{{ str($state)->replace('"', '\\"') }}"
            x-ref="newState" />

        <input
            x-model="state"
            type="{{ $getType() }}"
            {!! $isDisabled() ? 'disabled' : null !!}
            x-bind:disabled="!checkboxState"
            {!! ($inputMode = $getInputMode()) ? "inputmode=\"{$inputMode}\"" : null !!}
            {!! ($placeholder = $getPlaceholder()) ? "placeholder=\"{$placeholder}\"" : null !!}
            {!! ($interval = $getStep()) ? "step=\"{$interval}\"" : null !!}
            x-on:change{{ $getType() === 'number' ? '.debounce.1s' : null }}="
            isLoading = true
            checkboxState = false
            response = await $wire.updateTableColumnState(@js($getName()), @js($recordKey), $event.target.value)
            error = response?.error ?? undefined
            if (! error) state = response
            isLoading = false
        "
            :readonly="isLoading"
            x-tooltip="error"
            {{ $attributes->merge($getExtraInputAttributes())->merge($getExtraAttributes())->class([
                    'ml-0.5 text-gray-900 inline-block transition duration-75 rounded-lg shadow-sm outline-none focus:ring-primary-500 focus:ring-1 focus:ring-inset focus:border-primary-500 disabled:opacity-70 read-only:opacity-50',
                    $alignClass,
                    'dark:bg-gray-700 dark:text-white dark:focus:border-primary-500' => config('forms.dark_mode'),
                ]) }}
            x-bind:class="{
                'border-gray-300': !error,
                'dark:border-gray-600': (!error) && @js(config('forms.dark_mode')),
                'border-danger-600 ring-1 ring-inset ring-danger-600': error,
            }" />
    </div>
</div>
