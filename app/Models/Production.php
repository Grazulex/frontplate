<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Production extends Model
{
    use HasFactory;
    use Searchable;

    protected $searchableFields = ['*'];

    public function plates(): HasMany
    {
        return $this->hasMany(Plate::class);
    }
}
