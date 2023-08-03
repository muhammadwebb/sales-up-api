<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCompany
 */
class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'phone',
        'is_current_active'
    ];

    public function user(): BelongsTo
    {return $this->belongsTo(User::class);}

    public function courses(): HasMany
    {return $this->hasMany(Course::class);}

    public function status(): HasMany
    {return $this->hasMany(Status::class);}

    public function marketings(): HasMany
    {return $this->hasMany(Marketing::class);}

    public function bots(): HasMany
    {return $this->hasMany(Bot::class);}

    public function sources(): HasMany
    {return $this->hasMany(Source::class);}

    public function leads(): HasMany
    {return $this->hasMany(Lead::class);}
}
