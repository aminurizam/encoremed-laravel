<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'appt_datetime', 'arrived_at', 'status', 'patient_id'];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function getCreatedAtAttribute($date)
    {
        // only support MY timezone, this can be retrieve from user timezone
        return Carbon::parse($date)->timezone('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->timezone('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');
    }

    public function getArrivedAtAttribute($date)
    {
        return !$date ? null : Carbon::parse($date)->timezone('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');
    }

    public function getApptDatetimeAttribute($date)
    {
        return Carbon::parse($date)->timezone('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');
    }
}
