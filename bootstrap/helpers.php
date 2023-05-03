<?php

use Illuminate\Support\Carbon;

if (!function_exists('app_path')) {
    /**
     * Get the path to the application folder.
     *
     * @param  string $path
     * @return string
     */
    function app_path($path = '')
    {
        return app('path') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

/**
 * Convert SQL string date
 *
 * @param mixed $value
 * @return DateTimeInterface|null
 */
function to_datetime(mixed $value): ?DateTimeInterface
{
    if (isset($value)) {
        return Carbon::createFromFormat(SQL_DATE_FORMAT, $value);
    }
    return null;
}

/**
 * Test if current date is between two given date
 *
 * @param mixed $start_date
 * @param mixed $end_date
 * @param boolean $equal
 * @return boolean
 */
function is_expired(mixed $start_date, mixed $end_date, $equal = true): bool
{
    $now = Carbon::now();
    $startDate = is_null($start_date) ? $now : to_datetime($start_date);
    $endDate = is_null($end_date) ? $now : to_datetime($end_date);

    if ($equal) {
        return $now->lessThan($startDate) || $now->greaterThan($endDate);
    }
    return $now->lessThanOrEqualTo($startDate) || $now->greaterThanOrEqualTo($endDate);
}

/**
 * Test if date is future or not
 *
 * @param DateTimeInterface $date
 * @param bool $strict
 * @return boolean
 */
function is_future(DateTimeInterface $date, bool $strict = false): bool
{
    $now = Carbon::now();
    return $strict ? $now->lessThan($date) : $now->lessThanOrEqualTo($date);
}

/**
 * Test if date is past or not
 *
 * @param DateTimeInterface $date
 * @param bool $strict
 * @return boolean
 */
function is_past(DateTimeInterface $date, bool $strict = false): bool
{
    $now = Carbon::now();
    return $strict ? $now->greaterThan($date) : $now->greaterThanOrEqualTo($date);
}

/**
 * Get access slug from config
 *
 * @param string $slug
 * @return string
 */
function get_access_by_slug(string $slug): string
{
    return config('access.' . $slug, '');
}
