<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use GeneratesUuid;

    protected $hidden = ['id', 'account_id', 'type_id', 'category_id'];

    public function account()
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }

    public function type()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function keyword_match()
    {
        return $this->hasMany(KeywordMatch::class, 'comment_id', 'id');
    }
}
