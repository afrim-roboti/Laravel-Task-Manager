<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'priority',
    ];

    protected $casts = [
        'status' => 'boolean', // Trajton statusin si boolean
        'priority' => 'integer', // Trajton prioritetin si integer
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
