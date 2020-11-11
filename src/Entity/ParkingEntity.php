<?php

namespace App\Entity;

class ParkingEntity
{
    /**
     * @var int
     */
    private $maxSpots = 10;

    /**
     * @return int
     */
    public function getMaxSpots(): int
    {
        return $this->maxSpots;
    }

    /**
     * @param int $maxSpots
     * @return ParkingEntity
     */
    public function setMaxSpot(int $maxSpots): ParkingEntity
    {
        $this->maxSpots = $maxSpots;
        return $this;
    }
}
