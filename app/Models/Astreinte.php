<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Astreinte extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'astreintes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'montant',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function emplois()
    {
        return $this->belongsToMany(Emploi::class);
    }

    public function zones()
    {
        return $this->belongsToMany(Zone::class);
    }
}
