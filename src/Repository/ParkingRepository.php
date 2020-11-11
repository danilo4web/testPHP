<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\ParkingEntity;

/**
 * Class ParkingRepository
 *
 * @package App\Service
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class ParkingRepository implements ParkingRepositoryInterface
{
    /**
     * @var array
     */
    private $spots = [];

    /**
     * @inheritDoc
     */
    public function insertCar(string $car): void
    {
        if (!$this->hasFreeSpot()) {
            throw new \RuntimeException("Have no free spot to park the car: " . $car);
        }

        $this->spots[] = $car;
    }

    /**
     * @inheritDoc
     */
    public function removeCar(string $car): void
    {
        $index = array_search($car, $this->spots);
        unset($this->spots[$index]);
    }

    /**
     * @inheritDoc
     */
    public function findAll(): array
    {
        return $this->spots;
    }

    /**
     * @return boolean
     */
    private function hasFreeSpot(): bool
    {
        return $this->freeSpotsAmount() > 0;
    }

    /**
     * @return integer
     */
    private function freeSpotsAmount(): int
    {
        $parkingEntity = new ParkingEntity();
        return $parkingEntity->getMaxSpots() - count($this->spots);
    }
}
