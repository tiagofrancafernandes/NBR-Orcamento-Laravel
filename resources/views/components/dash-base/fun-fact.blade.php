<div class="fun-fact" data-fun-fact-color="{{ $colorStyle ?? '#22b8c8' }}">
    <div class="fun-fact-text">
        {{ $slot }}
    </div>

    <x-dash-base.fun-fact-icon :icon="$icon"/>
</div>
