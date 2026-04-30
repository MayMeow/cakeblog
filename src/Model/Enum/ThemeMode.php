<?php
declare(strict_types=1);

namespace App\Model\Enum;

enum ThemeMode: string
{
    case Auto = 'auto';
    case Light = 'light';
    case Dark = 'dark';

    /**
     * Resolve a string to a ThemeMode case, falling back to Auto.
     */
    public static function fromName(string $value, self $fallback = self::Auto): self
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case;
            }
        }

        return $fallback;
    }
}
