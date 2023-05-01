<?php

namespace App\View\Components\DashBase;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FunFact extends Component
{
    protected ?string $colorStyle = null;

    // http://www.zonums.com/online/color_converter/
    public const COLOR_YELLOW = '#efa80f'; // 'rgb(239, 168, 15)';
    public const COLOR_GREEN = '#36bd78'; // 'rgb(54, 189, 120)';
    public const COLOR_PURPLE = '#b81b7f'; // 'rgb(184, 27, 127)';
    public const COLOR_BLUE = '#22b8c8'; // 'rgb(34, 184, 200)';

    public const COLORS = [
        'yellow' => self::COLOR_YELLOW,
        'green' => self::COLOR_GREEN,
        'purple' => self::COLOR_PURPLE,
        'blue' => self::COLOR_BLUE,
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $icon = \null,
        public ?string $color = 'blue'
    ) {
        $validHexColor = function ($colorStyle, string $defaultValue = '#22b8c8') {
            try {
                $colorStyle = trim((string) $colorStyle);

                return \str_starts_with($colorStyle, '#') && \strlen($colorStyle) === 7 ? $colorStyle : $defaultValue;
            } catch (\Throwable $th) {
                return $defaultValue;
            }
        };

        $this->colorStyle = $validHexColor(trim(static::COLORS[$color] ?? $color), self::COLORS['blue']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dash-base.fun-fact', [
            'colorStyle' => $this->colorStyle,
            'icon' => $this->icon,
        ]);
    }
}
