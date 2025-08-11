<?php

namespace App\Services;

class Session
{
    private static function flashMessage(string $message, string $style): void
    {
        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', $style);
    }

    public static function success(string $message = 'success'): void
    {
        self::flashMessage($message, 'success');
    }

    public static function failed(string $message = 'failed'): void
    {
        self::flashMessage($message, 'danger');
    }

    public static function warning(string $message = 'warning'): void
    {
        self::flashMessage($message, 'warning');
    }

    public static function info(string $message = 'info'): void
    {
        self::flashMessage($message, 'info');
    }
}
