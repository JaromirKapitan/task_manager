<?php

namespace App\Enums;

enum TaskStatus: string
{
    case TODO = 'todo';
    case DOING = 'doing';
    case DONE = 'done';

    public function getTitle(): string
    {
        return match ($this) {
            self::TODO => 'To Do',
            self::DOING => 'Doing',
            self::DONE => 'Done',
        };
    }

    public function cssClass(): string
    {
        return match ($this) {
            self::TODO => 'bg-yellow-200 text-yellow-800',
            self::DOING => 'bg-blue-200 text-blue-800',
            self::DONE => 'bg-green-200 text-green-800',
        };
    }
}
