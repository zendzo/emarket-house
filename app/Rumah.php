<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $fillable = [
        'rumah_type_id',
        'perumahan_id',
        'block',
        'number',
        'subsidi',
        'harga',
        'booked_by',
        'document_approved',
    ];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }

    public function bookedBy()
    {
        return $this->belongsTo(User::class,'booked_by');
    }

    public function rumahType()
    {
        return $this->belongsTo(RumahType::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function angsurans()
    {
        return $this->hasMany(Angsuran::class);
    }
}
