<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use GeneratesUuid;

    public function type()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
