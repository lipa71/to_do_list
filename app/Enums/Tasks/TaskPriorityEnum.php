<?php

namespace App\Enums\Tasks;

enum TaskPriorityEnum: int
{
    case LOW = 1;
    case MEDIUM = 2;
    case HIGH = 3;

    public static function description($property): string
    {
        switch ($property) {
            case self::LOW:
                return __('Low');
            case self::MEDIUM:
                return __('Medium');
            case self::HIGH:
                return __('High');
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
