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

    protected $fillable = ['user_id', 'amount', 'total', 'comment', 'close_id'];

    protected $casts = [
        'amount'    => 'integer',
        'total'     => 'integer'
    ];

    protected $searchableFields = ['*'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function close(): BelongsTo
    {
        return $this->belongsTo(Close::class);
    }


    public function setAmountAttribute($price): void
    {
        $this->attributes['amount'] = $price * 100;
    }

}
