<?php

namespace App\Console\Commands;

use App\Enums\OriginEnums;
use App\Enums\TypeEnums;
use App\Jobs\ProcessUpdateDateInMotiv;
use App\Jobs\ProcessUpdateDateEshop;
use App\Mail\Test;
use App\Models\Plate;
use App\Models\Production;
use App\Services\ProductionService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'otm:test:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'testing OTM email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $destinataires = explode(',',env('OTM_PRODUCTIONS_EMAILS'));
        foreach ($destinataires as $recipient) {
            $this->info('Mail send to  '.$recipient);
            Mail::to($recipient)->send(new Test());
        }
    }
}
