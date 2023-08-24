<?php

namespace App\Filament\Extends\Tables\Columns;

use Closure;
use Filament\Tables\Columns\Column;
use Filament\Forms\Components\Concerns\HasExtraInputAttributes;
use Filament\Forms\Components\Concerns\HasInputMode;
use Filament\Forms\Components\Concerns\HasPlaceholder;
use Filament\Forms\Components\Concerns\HasStep;
use Filament\Tables\Columns\Contracts\Editable;

class TooglableTextInputColumn extends Column implements Editable
{
    use \Filament\Tables\Columns\Concerns\CanBeValidated;
    use \Filament\Tables\Columns\Concerns\CanUpdateState;
    use HasExtraInputAttributes;
    use HasInputMode;
    use HasPlaceholder;
    use HasStep;

    protected string $view = 'tables::columns.togglable-text-input-column';

    protected null|string|int|bool $checkboxState = null;

    protected string | Closure | null $type = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->disableClick();
    }

    public function type(string | Closure | null $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): string
    {
        return $this->evaluate($this->type) ?? 'text';
    }

    public function getCheckboxState(): bool
    {
        return boolval($this->checkboxState ?? false);
    }

    public function toggleCheckboxState(): void
    {
        $this->checkboxState = !$this->checkboxState;
    }
}
