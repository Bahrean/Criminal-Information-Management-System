<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class DepartmentPost extends Model
{
    use HasFactory;
    protected $guarded = [];
    use Commentable;
}
