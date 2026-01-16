<?php
declare(strict_types=1);

namespace App\Model\Enum;

enum AccentColor: string
{
    case Red = 'oklch(70.4% 0.191 22.216)';
    case Orange = 'oklch(75% 0.183 55.934)';
    case Amber = 'oklch(82.8% 0.189 84.429)';
    case Yellow = 'oklch(85.2% 0.199 91.936)';
}