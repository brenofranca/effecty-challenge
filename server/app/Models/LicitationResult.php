<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LicitationResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_estimated',
        'value_contracted',
        'value_economized',
    ];

    public function licitation(): BelongsTo
    {
        return $this->belongsTo(Licitation::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
