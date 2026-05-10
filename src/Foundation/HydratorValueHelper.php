<?php

declare(strict_types=1);

namespace LanBilling\Foundation;

use DateTimeImmutable;
use UnexpectedValueException;

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

    public static function hydrateRequiredString(mixed $value, string $field): string
    {
        $stringValue = self::hydrateString($value);

        if ($stringValue !== null) {
            return $stringValue;
        }

        throw new UnexpectedValueException(sprintf('Expected non-null string for %s.', $field));
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

    public static function hydrateRequiredInt(mixed $value, string $field): int
    {
        $intValue = self::hydrateInt($value);

        if ($intValue !== null) {
            return $intValue;
        }

        throw new UnexpectedValueException(sprintf('Expected non-null int for %s.', $field));
    }

    public static function hydrateRequiredFloat(mixed $value, string $field): float
    {
        $floatValue = self::hydrateFloat($value);

        if ($floatValue !== null) {
            return $floatValue;
        }

        throw new UnexpectedValueException(sprintf('Expected non-null float for %s.', $field));
    }

    public static function hydrateRequiredBool(mixed $value, string $field): bool
    {
        $boolValue = self::hydrateBool($value);

        if ($boolValue !== null) {
            return $boolValue;
        }

        throw new UnexpectedValueException(sprintf('Expected non-null bool for %s.', $field));
    }

    public static function hydrateRequiredDateTime(mixed $value, string $field): DateTimeImmutable
    {
        $dateTime = self::hydrateDateTime($value);

        if ($dateTime !== null) {
            return $dateTime;
        }

        throw new UnexpectedValueException(sprintf('Expected non-null datetime for %s.', $field));
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
