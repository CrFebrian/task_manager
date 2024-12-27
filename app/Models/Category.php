<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description'];
    use HasFactory, SoftDeletes;

    /*protected static function newFactory() {
        return new CategoryFactory();
    }*/

        public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
