<?php

namespace App\Models;

use App\Traits\FillableInputTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, FillableInputTrait;

    protected $fillableMapPrefix = 'company';

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
