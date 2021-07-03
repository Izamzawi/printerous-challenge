<?php

namespace App\Models;

use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'website',
        'logo',
        'user_id',
    ];

    public function person()
    {
        return $this->hasMany(Person::class);
    }
}
