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

    protected $fillable = ['customer_id', 'close_id'];
    protected $searchableFields = ['*'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function close(): BelongsTo
    {
        return $this->belongsTo(Close::class);
    }

    public function plates(): HasMany
    {
        return $this->hasMany(Plate::class);
    }
}
