<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cash extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'amount',
        'total',
        'comment',
        'close_id'
    ];

    protected $casts = [
        'amount'    => 'integer',
        'total'     => 'integer'
    ];

    protected $searchableFields = ['*'];

    /**
     * 
     * @return BelongsTo 
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
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
     * @param mixed $price 
     * @return void 
     */
    public function setAmountAttribute($price): void
    {
        $this->attributes['amount'] = $price * 100;
    }
}
