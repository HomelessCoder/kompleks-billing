<?php

declare(strict_types=1);

namespace LanBilling\Foundation;

use DateTimeImmutable;

final class HydratorValueHelper
{
    public static function hydrateString(mixed $value): ?string
    {
        return null === $value ? null : (string) $value;
    }

    public static function hydrateInt(mixed $value): ?int
    {
        return null === $value ? null : (int) $value;
    }

    public static function hydrateFloat(mixed $value): ?float
    {
        return null === $value ? null : (float) $value;
    }

    public static function hydrateBool(mixed $value): ?bool
    {
        return null === $value ? null : (bool) $value;
    }

    public static function hydrateDateTime(mixed $value): ?DateTimeImmutable
    {
        if ($value === null || $value === '0000-00-00 00:00:00') {
            return null;
        }

        return new DateTimeImmutable((string) $value);
    }

    public static function hydrateDate(mixed $value): ?DateTimeImmutable
    {
        if ($value === null || $value === '0000-00-00') {
            return null;
        }

        return new DateTimeImmutable((string) $value);
    }

    public static function dehydrateBool(?bool $value): ?int
    {
        return null === $value ? null : (int) $value;
    }

    public static function dehydrateDate(?DateTimeImmutable $value): ?string
    {
        return $value?->format('Y-m-d');
    }

    public static function dehydrateNullableDateTime(?DateTimeImmutable $value): ?string
    {
        return $value?->format('Y-m-d H:i:s');
    }

    public static function dehydrateZeroDateTime(?DateTimeImmutable $value): string
    {
        return $value?->format('Y-m-d H:i:s') ?? '0000-00-00 00:00:00';
    }
}
