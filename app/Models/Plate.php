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
        'is_rush',
        'created_at',
        'production_id',
        'datas'
    ];

    protected $casts = [
        'origin'    => OriginEnums::class,
        'datas'     => 'array',
        'is_cod'    => 'boolean',
        'is_rush'   => 'boolean',
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
