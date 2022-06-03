<?php

namespace App\Models;

use App\Enums\DeliveryTypeEnums;
use App\Enums\LocationReportTypeEnums;
use App\Enums\ProcessTypeEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Customer extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name', 
        'delivery_type', 
        'delivery_contact', 
        'delivery_street', 
        'delivery_number', 
        'delivery_box', 
        'delivery_zip', 
        'delivery_city', 
        'is_delivery_grouped', 
        'is_delivery_bpost', 
        'is_inmotiv_customer', 
        'process_type', 
        'process_file', 
        'location_report_type'
    ];

    protected $casts = [
        'delivery_type'    => DeliveryTypeEnums::class,
        'process_type'  => ProcessTypeEnums::class,
        'location_report_type' => LocationReportTypeEnums::class,
        'is_delivery_grouped'     => 'boolean',
        'is_delivery_bpost'     => 'boolean',
        'is_inmotiv_customer'     => 'boolean',
    ];

    protected $searchableFields = ['*'];

}
