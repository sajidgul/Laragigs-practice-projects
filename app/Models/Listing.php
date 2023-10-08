<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['company', 'title', 'location', 'user_id', 'logo', 'email', 'website', 'tags', 'description'];

    public function ScopeFilter($query, array $filters){
        // dd($filters['tag']);
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%'.request('tag').'%'); 
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%'.request('search').'%')
                    ->orWhere('tags', 'like', '%'.request('search').'%');
        }
    }
    
    // Relation to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}