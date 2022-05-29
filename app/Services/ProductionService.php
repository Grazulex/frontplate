<?php

namespace App\Services;

use App\Models\Production;

class ProductionService {

    public $production;

    public function __construct(Production $production)
    {
        $this->production = $production;
    }

    public function makeCsv()
    {
        $fp = fopen('prod_'.$this->production->id.'.csv', 'w');
        fputcsv($fp, array('Plate nr.', 'Ref plaque', 'Order date', 'OwnerID', 'Nom Client', 'Rue Client', 'Nr. Client', 'Boite ClIENT', 'Commune', 'Code postal'), ";");
        foreach ($this->production->plates as $plate) {
            $datas = json_decode($plate->datas);
            fputcsv($fp, array($plate->reference, $plate->type, $plate->created_at, $plate->order_id, $plate->customer, $datas->destination_street, $datas->destination_house_number, $datas->destination_bus, $datas->destination_city, $datas->destination_postal_code), ";");
        }
        fclose($fp);
    }

    public function deleteCSV()
    {
        unlink('prod_'.$this->production->id.'.csv');
    }
}