<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slot extends Model
{
    use HasFactory;

    public function pitch(): BelongsTo
    {
        return $this->belongsTo(Pitch::class, 'pitch_id');
    }
}
