<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperSource
 */
class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'type_id',
        'title'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }
}
