<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Close extends Model
{
    use HasFactory;
    use Searchable;

    protected $searchableFields = ['*'];
    
    public function cashes(): HasMany
    {
        return $this->hasMany(Cash::class);
    }

}
