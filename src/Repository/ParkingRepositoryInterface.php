<?php

declare(strict_types=1);

namespace App\Repository;

/**
 * Class ParkingRepositoryInterface
 *
 * @package App\Repository
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
interface ParkingRepositoryInterface
{
    /**
     * @param string $car
     * @return void
     * @throws \RuntimeException
     */
    public function insertCar(string $car): void;

    /**
     * @param string $car
     * @return void
     * @throws \RuntimeException
     */
    public function removeCar(string $car): void;

    /**
     * @return array
     */
    public function findAll(): array;
}