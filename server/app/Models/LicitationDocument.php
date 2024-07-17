<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LicitationDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file_url',
        'file_name',
    ];

    public function licitation(): BelongsTo
    {
        return $this->belongsTo(Licitation::class);
    }
}
