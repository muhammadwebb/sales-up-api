<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperMessage
 */
class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'text',
        'message_id',
        'is_answer',
        'seen'
    ];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }
}
