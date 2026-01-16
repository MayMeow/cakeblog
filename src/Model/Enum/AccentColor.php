<?php
declare(strict_types=1);

namespace App\Model\Enum;

enum AccentColor: string
{
    case Red = 'oklch(70.4% 0.191 22.216)';
    case Orange = 'oklch(75% 0.183 55.934)';
    case Amber = 'oklch(82.8% 0.189 84.429)';
    case Yellow = 'oklch(85.2% 0.199 91.936)';
    case Lime = 'oklch(84.1% 0.238 128.85)';
    case Green = 'oklch(79.2% 0.209 151.711)';
    case Emerald = 'oklch(76.5% 0.177 163.223)';
    case Teal = 'oklch(77.7% 0.152 181.912)';
    case Cyan = 'oklch(78.9% 0.154 211.53)';
    case Sky = 'oklch(74.6% 0.16 232.661)';
    case Blue = 'oklch(70.7% 0.165 254.624)';
    case Indigo = 'oklch(67.3% 0.182 276.935)';
    case Violet = 'oklch(70.2% 0.183 293.541)';
    case Purple = 'oklch(71.4% 0.203 305.504)';
    case Fuchsia = 'oklch(74% 0.238 322.16)';
    case Pink = 'oklch(71.8% 0.202 349.761)';
    case Rose = 'oklch(71.2% 0.194 13.428)';

    public static function fromName(string $name, self $fallback = self::Blue): self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }
        
        return $fallback;
    }
}