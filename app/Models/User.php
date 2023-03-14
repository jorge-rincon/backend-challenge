<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'city'
    ];

    protected $table = 'users';

    /*
     * Get the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /*
    * Methods
    */
    public function insertUser($users)
    {
        return User::firstOrNew([
            'id' => $users['id'],
            'name' => $users['name'],
            'email' => $users['email'],
            'city' => $users['city'],
        ]);
    }


}
