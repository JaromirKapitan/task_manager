<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'deadline_at',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // scope search by title or description
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term)
                  ->orWhere('description', 'like', $term);
        });
    }

    // scope filter by status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
