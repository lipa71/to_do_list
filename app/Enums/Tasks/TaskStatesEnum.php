<?php

namespace App\Enums\Tasks;

enum TaskStatesEnum: int
{
    case TO_DO = 1;
    case IN_PROGRESS = 2;
    case DONE = 3;

    public static function description($property): string
    {
        switch ($property) {
            case self::TO_DO:
                return __('To do');
            case self::IN_PROGRESS:
                return __('In Progress');
            case self::DONE:
                return __('Done');
            default:
                return '';
        }
    }

    public static function getArray(): array
    {
        $array = [];

        foreach (self::cases() as $case) {
            $array[] = [
                'value' => $case->value,
                'description' => self::description($case),
            ];
        }

        return $array;
    }
}
