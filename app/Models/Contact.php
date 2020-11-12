<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contact_value'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function type()
    {
        return $this->hasOne(ContactType::class, 'id', 'contact_type_id');
    }
}
