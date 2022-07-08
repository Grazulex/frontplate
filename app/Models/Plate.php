<?php

namespace App\Models;

use App\Enums\OriginEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plate extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'reference',
        'type',
        'origin',
        'order_id',
        'customer',
        'customer_key',
        'is_cod',
        'is_incoming',
        'is_rush',
        'amount',
        'created_at',
        'production_id',
        'incoming_id',
        'datas',
        'plate_type',
        'product_type',
        'client_code'
    ];

    protected $casts = [
        'origin'    => OriginEnums::class,
        'datas'     => 'array',
        'is_cod'    => 'boolean',
        'is_rush'   => 'boolean',
        'is_incoming'   => 'boolean',
        'amount' => 'integer'
    ];

    protected $searchableFields = ['*'];

    /**
     *
     * @return BelongsTo
     */
    public function production(): BelongsTo
    {
        return $this->belongsTo(
            related: Production::class,
            foreignKey: 'production_id'
        );
    }

    /**
     *
     * @return BelongsTo
     */
    public function incoming(): BelongsTo
    {
        return $this->belongsTo(
            related: Incoming::class,
            foreignKey: 'incoming_id'
        );
    }
}
