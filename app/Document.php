<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Document extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'rumah_id',
        'document_type_id',
        'approved',
        // 'descripton'
    ];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }

    public function type()
    {
        return $this->belongsTo(DocumentType::class,'document_type_id');
    }
}
