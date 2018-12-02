<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Carbon\Carbon;

class Angsuran extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        // 'user_id',
		'rumah_id',
		'kode',
		'total',
		'tanggal_bayar',
        'tanggal_tempo',
        'angsuran',
        'paid'
    ];

    protected $dates = ['tanggal_bayar','tanggal_tempo'];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }

    public function setTanggalBayarAttribute($value)
	{
		$this->attributes['tanggal_bayar'] = Carbon::createFromFormat('d-m-Y',$value)->toDateString();
	}
}
