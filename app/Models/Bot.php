<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperBot
 */
class Bot extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'token',
        'chat_id',
        'username',
        'filename',
        'contact',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
