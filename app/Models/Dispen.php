<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dispen extends Model
{
    use HasFactory;

    protected $table = 'dispen'; 
    protected $guarded = ['id'];

    /**
     * Get the User that owns the Dispen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Get all of the User for the Dispen
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /**
     * Get the Dispen that owns the Dispen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    }
