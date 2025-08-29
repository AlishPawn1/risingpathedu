<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'title', 'description',
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}