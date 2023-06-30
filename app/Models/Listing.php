<?php

namespace App\Models;

use App\Models\User;
use PHPUnit\Util\Filter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters){
        //  dd($filters['tag']);
        if($filters['tag'] ?? false){
            $query->where('tags' , 'like' , '%' . request('tag') .'%');
        }

        if($filters['search'] ?? false){
            $query->where('title' , 'like' , '%' . request('search') .'%')
                    ->orwhere('description' , 'like' , '%' . request('search') .'%')
                    ->orwhere('tags' , 'like' , '%' . request('search') .'%');
        }
    }

     // Relationship To User
     public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
