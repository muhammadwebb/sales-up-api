<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperLead
 */
class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'link_id',
        'status_id',
        'chat_id',
        'first_name',
        'last_name',
        'username',
        'phone',
        'comment'
    ];

    public function company(): BelongsTo
    {return $this->belongsTo(Company::class);}

    public function status(): BelongsTo
    {return $this->belongsTo(Status::class);}

    public function link(): BelongsTo
    {return $this->belongsTo(Link::class);}

    public function orders(): HasMany
    {return $this->hasMany(Order::class);}

    public function messages(): HasMany
    {return $this->hasMany(Message::class);}
}
