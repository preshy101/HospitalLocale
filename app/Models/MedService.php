<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Hospital;
class MedService extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hospital(): BelongsTo{
    return $this->belongsTo(Hospital::class, 'hospital_id');
    }
}