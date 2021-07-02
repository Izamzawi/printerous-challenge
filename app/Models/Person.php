<?php

namespace App\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'avatar',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
