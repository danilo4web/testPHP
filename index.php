<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Service\ParkingService;
use App\Repository\ParkingRepository;

$parkingService = new ParkingService(
    new ParkingRepository()
);

$parkingService->executeRoutineNeeded();