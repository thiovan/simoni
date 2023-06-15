<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;
    use GeneratesUuid;

    protected $hidden = ['id'];
}
