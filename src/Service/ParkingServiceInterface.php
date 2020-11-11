<?php declare(strict_types=1);

namespace App\Service;

/**
 * Interface ParkingServiceInterface
 *
 * @package App\Service
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
interface ParkingServiceInterface
{
    /**
     * This method is needed just to call the routine asked on the test
     * @return void
     * @throws \Exception
     */
    public function executeRoutineNeeded(): void;
}