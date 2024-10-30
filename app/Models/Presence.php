<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    /**
     * Get the User that owns the Presence
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Level that owns the Presence
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Get the Major that owns the Presence
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }
}
