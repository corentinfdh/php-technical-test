<?php

namespace App;

use App\Entity\RunningOuting;

/**
 * Class RunningOutingManager
 * @package App
 */
class RunningOutingManager
{
    /**
     * Calculate the average speed.
     * Distance (km) / Duration (h)
     *
     * @param RunningOuting $runningOuting
     * @return int
     */
    public function calculateAverageSpeed(RunningOuting $runningOuting) : int {
        if ($runningOuting->getDistance() && $runningOuting->getDuration()) {
            // calculate total hours.
            $totalHours = $runningOuting->getDuration()->format('H') + $runningOuting->getDuration()->format('i') / 60;

            return round($runningOuting->getDistance() / $totalHours, 1);
        }
    }

    /**
     * Calculate the average pace.
     * pace = 60 (s) / speed
     *
     * @param RunningOuting $runningOuting
     * @return int
     */
    public function calculateAveragePace(RunningOuting $runningOuting) : int {
        if ($runningOuting->getAverageSpeed()) {
            return $averagePace = round(60 / $runningOuting->getAverageSpeed(), 2);
        }
    }
}