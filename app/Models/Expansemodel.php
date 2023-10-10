<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expansemodel extends Model
{
    protected $table = 'expanses';
    protected $fillable = ['user_id','name', 'amount','manager_check','hod_check','status','file','comments', 'created_at', 'updated_at'];
    use HasFactory;
}
