<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Licitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'department',
        'status',
        'objective',
        'form_acquisition',
        'date_published',
        'winner_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(LicitationDocument::class);
    }

    public function responsibles(): HasMany
    {
        return $this->hasMany(LicitationResponsible::class);
    }

    public function candidates(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'licitation_candidates');
    }

    public function result(): HasOne
    {
        return $this->hasOne(LicitationResult::class);
    }

    public function winner(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'winner_id');
    }
}
