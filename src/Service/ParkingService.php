<?php declare(strict_types=1);

namespace App\Service;

use App\Repository\ParkingRepositoryInterface;

/**
 * Class ParkingService
 *
 * @package App\Service
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class ParkingService implements ParkingServiceInterface
{
    /**
     * @var App\Repository\ParkingRepository
     */
    private $parkingRepository;

    /**
     * ParkingService constructor.
     * @param ParkingRepositoryInterface $parkingRepository
     */
    public function __construct(ParkingRepositoryInterface $parkingRepository)
    {
        $this->parkingRepository = $parkingRepository;
    }

    /**
     * @inheritDoc
     */
    public function executeRoutineNeeded(): void
    {
        $this->insertCars(
            [
                'AAA-1111',
                'AAA-1112',
                'AAA-1113',
                'AAA-1114',
                'AAA-1115',
                'AAA-1116',
                'AAA-1117',
                'AAA-1118',
                'AAA-1119',
                'AAA-1120',
                'AAA-1121'
            ]
        );
        echo PHP_EOL;

        $this->removeCars(
            [
                'AAA-1111',
                'AAA-1120'
            ]
        );
        echo PHP_EOL;

        $this->insertCars(
            [
                'AAA-3112',
                'AAA-3112',
                'AAA-3222'
            ]
        );
        echo PHP_EOL;

        $carsParkedAtTheMoment = $this->showCars();

        echo json_encode($carsParkedAtTheMoment);
    }

    private function showCars(): array
    {
        return $this->parkingRepository->findAll();
    }

    /**
     * @param array $cars
     * @throws \Exception
     */
    private function insertCars(array $cars): void
    {
        foreach ($cars as $car) {
            try {
                $this->parkingRepository->insertCar($car);
                echo $car . " was succesfully parked" . PHP_EOL;
            } catch (\RuntimeException $exception) {
                echo $exception->getMessage() . PHP_EOL;
            }
        }
    }

    /**
     * @param array $cars
     */
    private function removeCars(array $cars): void
    {
        foreach ($cars as $car) {
            try {
                $this->parkingRepository->removeCar($car);
                echo $car . " was succesfully removed" . PHP_EOL;
            } catch (\RuntimeException $exception) {
                echo $exception->getMessage() . PHP_EOL;
            }
        }
    }
}
