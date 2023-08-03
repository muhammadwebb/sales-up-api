<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperLink
 */
class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_id',
        'url',
        'code',
        'price',
    ];

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }
}
