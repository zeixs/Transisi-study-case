<?php

namespace App\Models;

use App\Traits\FillableInputTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, FillableInputTrait;

    protected $fillableMapPrefix = 'employee';

    protected $fillable = [
        'name',
        'email',
        'company_id'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
