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

    protected $fillable = ['diff'];

    protected $casts = [
        'diff'    => 'integer',
    ];

    protected $searchableFields = ['*'];

    /**
     * 
     * @return HasMany 
     */
    public function cashes(): HasMany
    {
        return $this->hasMany(
            related: Cash::class,
            foreignKey: 'close_id'
        );
    }

    /**
     * 
     * @return HasMany 
     */
    public function receptions(): HasMany
    {
        return $this->hasMany(
            related: Reception::class,
            foreignKey: 'close_id'
        );
    }

    /**
     * 
     * @return HasMany 
     */
    public function incomings(): HasMany
    {
        return $this->hasMany(
            related: Incoming::class,
            foreignKey: 'close_id'
        );
    }
}
