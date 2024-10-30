<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory;
    protected $fillable = ['major'];    /**
     * Get all of the User for the Major
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function User(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
