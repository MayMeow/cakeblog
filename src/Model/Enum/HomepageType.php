<?php
declare(strict_types=1);

namespace App\Model\Enum;

enum HomepageType: string
{
    case HomeLatest = 'home_latest';
    case PostsList = 'posts_list';
    case PostsExcerpt = 'posts_excerpt';
    case PostsFull = 'posts_full';

    public static function fromName(string $name, self $fallback = self::HomeLatest): self
    {
        foreach (self::cases() as $case) {
            if ($case->value === $name) {
                return $case;
            }
        }

        return $fallback;
    }

    public function label(): string
    {
        return match ($this) {
            self::HomeLatest => __('Home + latest post'),
            self::PostsList => __('Posts list'),
            self::PostsExcerpt => __('Posts titles with excerpt'),
            self::PostsFull => __('Full post'),
        };
    }
}
