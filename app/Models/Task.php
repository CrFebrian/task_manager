<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Middleware;


class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = [
        'user_id',
        'id'
    ];

    protected $table = 'tasks';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'category_id',
        'status'
    ];
    // Contoh untuk Laravel
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
