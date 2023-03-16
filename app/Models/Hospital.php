<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Department;
use App\Models\MedService;
use App\Models\Doctors;
use App\Models\Gallery;

class Hospital extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function userOwnHospital(): BelongsTo{
    return $this->belongsTo(User::class, 'order_id');
    }
    public function departments():HasMany {
    return $this->hasMany(Department::class, 'hospital_id');
  }
    public function medServices():HasMany {
    return $this->hasMany(MedService::class, 'hospital_id');
  }
    public function doctors():HasMany {
    return $this->hasMany(Doctors::class, 'hospital_id');
  }
    public function gallery():HasMany {
    return $this->hasMany(Gallery::class, 'hospital_id');
  }
}