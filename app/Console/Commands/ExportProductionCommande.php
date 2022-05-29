<?php

namespace App\Console\Commands;

use App\Enums\TypeEnums;
use App\Mail\Production as MailProduction;
use App\Models\Plate;
use App\Models\Production;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
        $plates = Plate::whereNull('production_id')->whereIn('type', array_column(TypeEnums::cases(), 'name'))->get();
        if ($plates->count() > 0) {
            $production = Production::create();
            $fp = fopen('prod_'.$production->id.'.csv', 'w');
            fputcsv($fp, array('Plate nr.', 'Ref plaque', 'Order date', 'OwnerID', 'Nom Client', 'Rue Client', 'Nr. Client', 'Boite ClIENT', 'Commune', 'Code postal'), ";");
            foreach ($plates as $plate) {
                $datas = json_decode($plate->datas);
                fputcsv($fp, array($plate->reference, $plate->type, $plate->created_at, $plate->order_id, $plate->customer, $datas->destination_street, $datas->destination_house_number, $datas->destination_bus, $datas->destination_city, $datas->destination_postal_code), ";");
                $plate->production_id = $production->id;
                $plate->update();
            }
            fclose($fp);

            $destinataires = explode(',',env('OTM_PRODUCTIONS_EMAILS'));
            foreach ($destinataires as $recipient) {
                Mail::to($recipient)->send(new MailProduction($production));
            }

            unlink('prod_'.$production->id.'.csv');


        }
    }
}
