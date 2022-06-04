<?php

namespace App\Console\Commands;

use App\Enums\OriginEnums;
use App\Enums\TypeEnums;
use App\Jobs\ProcessUpdateDateInMotiv;
use App\Jobs\ProcessUpdateDateEshop;
use App\Mail\Production as MailProduction;
use App\Models\Plate;
use App\Models\Production;
use App\Services\ProductionService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Services\HolidayService;

class ExportProductionCommande extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'otm:export:production';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export order to email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $holidays = HolidayService::get();
        if ($holidays->isHoliday(Carbon::today()->month, Carbon::today()->day)) {
            return false;
            die();
        }

        $plates = Plate::whereNull('production_id')->whereIn('type', array_column(TypeEnums::cases(), 'name'))->get();
        if ($plates->count() > 0) {
            $production = Production::create();
            foreach ($plates as $plate) {
                $plate->production_id = $production->id;
                $plate->update();
                if ($plate->origin === OriginEnums::INMOTIV)
                {
                    $datas=['SEND_DATE'=>Carbon::now()->format('Y-m-d\TH:i:s')];
                    //ProcessUpdateDateInMotiv::dispatch($plate, $datas);
                } 
                if ($plate->origin === OriginEnums::ESHOP)
                {
                    $datas=['SEND_DATE'=>Carbon::now()->format('Y-m-d\TH:i:s')];
                    //ProcessUpdateDateEshop::dispatch($plate, $datas);
                }                 
            }

            $productionService = new ProductionService($production);
            $productionService->makeCsv();

            $destinataires = explode(',',env('OTM_PRODUCTIONS_EMAILS'));
            foreach ($destinataires as $recipient) {
                $this->info('Mail send to  '.$recipient);
                Mail::to($recipient)->send(new MailProduction($production));
            }

            $productionService->deleteCSV();


        }
    }
}
