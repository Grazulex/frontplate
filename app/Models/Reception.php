<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reception extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['amount_cash', 'amount_bbc', 'close_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'amount_cash'   => 'integer',
        'amount_bbc'    => 'integer'
    ];

    public function close(): BelongsTo
    {
        return $this->belongsTo(Close::class);
    }

    public function setAmountCashAttribute($price): void
    {
        $this->attributes['amount_cash'] = $price * 100;
    }

    public function setAmountBbcAttribute($price): void
    {
        $this->attributes['amount_bbc'] = $price * 100;
    }
}
