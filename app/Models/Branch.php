<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\SoftDeletes;
use Hrshadhin\Userstamps\UserstampsTrait;

class Branch extends Model
{
    use HasFactory,SoftDeletes;
    protected $softDelete = true;
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'branch_user')
            ->withPivot([
                'is_active',
                'assigned_at',
                'unassigned_at',
                'assignment_notes'
            ])
            ->withTimestamps();
    }
    
}
