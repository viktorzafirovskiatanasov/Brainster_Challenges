<?php

namespace App\Console\Commands;

use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanupExpiredVehicles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-expired-vehicles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Delete vehicles with expired insurance dates
        $expiredVehicles = Vehicle::whereDate( DB::raw("STR_TO_DATE(insurance_date, '%d-%m-%Y')"), '<', Carbon::now())->get();

        foreach ($expiredVehicles as $vehicle) {
           
            if ($vehicle->trashed()) {
                $this->info("Deleting vehicle with ID {$vehicle->id} - Insurance Date: {$vehicle->insurance_date}");
                $vehicle->forceDelete();
            } else {
                $this->info("Vehicle with ID {$vehicle->id} is not soft-deleted. Skipping force delete.");
            }
        }

        $this->info('Expired vehicles deleted successfully.');
    }
}
