<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incoming extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'customer_id',
        'close_id'
    ];

    protected $searchableFields = ['*'];

    /**
     * 
     * @return BelongsTo 
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            related: Customer::class,
            foreignKey: 'customer_id'
        );
    }

    /**
     * 
     * @return BelongsTo 
     */
    public function close(): BelongsTo
    {
        return $this->belongsTo(
            related: Close::class,
            foreignKey: 'close_id'
        );
    }

    /**
     * 
     * @return HasMany 
     */
    public function plates(): HasMany
    {
        return $this->hasMany(
            related: Plate::class,
            foreignKey: 'plate_id'
        );
    }
}
