<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pretension extends Model
{
    use SoftDeletes;

    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_REFUSED = 'refused';

    /**
     * Employee's roles.
     *
     * @var array
     */
    public static $statuses = [
        self::STATUS_ACCEPTED => 'Принят',
        self::STATUS_IN_PROGRESS => 'В процессе',
        self::STATUS_REFUSED => 'Отклонено'
    ];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'pretensions';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get relation to the branches table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get relation to the policies table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    /**
     * Get relation to the pretension_overviews table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pretension_overviews()
    {
        return $this->hasMany(PretensionOverview::class);
    }
}
