<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    
    protected $table ='members';
    protected $fillable = [
        'member_id',
        'last_name',
        'first_name',
        'middle_name',
        't_birth',
        'email',
        'phone',
        'aka',
        'gt',
        'batch_name',
        'current_chapter',
        'root_chapter',
        'status',
        'user_id',
        'user_type',
        
        'region',
        'province',
        'municipality',
        'barangay',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
