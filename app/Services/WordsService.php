<?php

namespace App\Services;

use DateTime;
use DateInterval;

class WordsService {
    public array $baseIntervals = [0, 1, 7, 14, 30, 90];

    public function calculateNextShowTime($word, $actualShownAt, $isCorrect)
    {
        $scheduledTime = new DateTime($word->next_show_at);
        $actualTime = new DateTime($actualShownAt);
        $interval = $scheduledTime->diff($actualTime);

        $daysLate = $interval->days;
        $isLate = $interval->invert === 0;

        $correctCount = $word->correct_count;

        if ($isCorrect && $isLate) {
            $correctCount = max(0, $correctCount - ceil($daysLate / 7));
        }

        if (!$isCorrect) {
            $correctCount = max(0, $correctCount - ceil($daysLate * 2 / 7));
        }

        $nextIntervalIndex = min($correctCount, count($this->baseIntervals) - 1);
        $nextInterval = $this->baseIntervals[$nextIntervalIndex];

        $nextShowTime = (new DateTime())->add(new DateInterval("P{$nextInterval}D"));

        return $nextShowTime->format('Y-m-d H:i:s');
    }
}
