<?php

namespace App\Console\Commands;

use App\Models\MusicianSponsor;
use Illuminate\Console\Command;
use Carbon\Carbon;

class UpdateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Controllo nel DB per il cambio variabile';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentDateTime = Carbon::now();
        MusicianSponsor::where('sponsor_end', '<', $currentDateTime)->update(['active' => false]);
    }
}
