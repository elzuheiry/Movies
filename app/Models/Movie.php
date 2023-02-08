<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];

    // All Scopes
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters["search"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("title", "like", "%" . $search . "%" ))
        );

        $query->when($filters["category"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("category_id", "like", "%" . $search . "%" ))
        );

        $query->when($filters["rate"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("rate", ">=", $search ))
        );
    }

    // 
    public function category()
    {
        return $this->belongsTo(Category::class)->where("status", "active");
    }

    // 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}