<?php

namespace App\Enums;

enum MatchStatus: string
{
    case SCHEDULED = 'SCHEDULED';
    case IN_PLAY = 'IN_PLAY';
    case FINISHED = 'FINISHED';
    case SUSPENDED = 'SUSPENDED';
    case POSTPONED = 'POSTPONED';
    case CANCELLED = 'CANCELLED';
    case TIMED = 'TIMED';

    public function label(): string
    {
      return match($this) {
        self::SCHEDULED => 'Agendado',
        self::TIMED => 'Programado',
        self::IN_PLAY => 'Em Jogo',
        self::FINISHED => 'Finalizado',
        self::SUSPENDED => 'Suspenso',
        self::POSTPONED => 'Adiado',
        self::CANCELLED => 'Cancelado',
      };

    }

    public function cssClass(): string
    {
      return match($this) {
        self::SCHEDULED => 'bg-pink-100 text-pink-800 dark:bg-blue-900 dark:text-blue-300',
        self::TIMED => 'bg-gray-100 text-gray-800 dark:bg-amber-900 dark:text-amber-300',
        self::IN_PLAY => 'bg-red-100 text-red-800 dark:bg-yellow-900 dark:text-yellow-300',
        self::FINISHED => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
        self::SUSPENDED => 'bg-yellow-100 text-yellow-800 dark:bg-gray-700 dark:text-gray-300',
        self::POSTPONED => 'bg-indigo-100 text-indigo-800  dark:bg-indigo-900 dark:text-indigo-300',
        self::CANCELLED => 'bg-purple-100 text-purple-800 dark:bg-red-900 dark:text-red-300',
      };

    }
}
