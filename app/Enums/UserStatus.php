<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;

enum UserStatus: string implements HasColor
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
    case PENDED = 'banned';

    public function getLabel(): string
    {
        return $this->value;
    }

    public function getColor(): string
    {
        return match($this) {
            self::ACTIVE => 'success',
            self::INACTIVE => 'secondary',
            self::SUSPENDED => 'warning',
            self::PENDED => 'danger',
        };
    }
}
