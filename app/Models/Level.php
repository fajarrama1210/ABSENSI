<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    /**
     * Get all of the comments for the Level
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function User(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
