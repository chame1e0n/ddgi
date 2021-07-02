<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;

    public const STATUS_CANCELLING = 'cancelling';
    public const STATUS_DEFECTIVE = 'defective';
    public const STATUS_LOST = 'lost';
    public const STATUS_POLICY_TRANSFER = 'policy_transfer';
    public const STATUS_TERMINATED = 'terminated';
    public const STATUS_UNDERWRITING = 'underwriting';

    /**
     * Employee's roles.
     * 
     * @var array
     */
    public static $statuses = [
        self::STATUS_CANCELLING => 'испорчен',
        self::STATUS_DEFECTIVE => 'бракован',
        self::STATUS_LOST => 'утерян',
        self::STATUS_POLICY_TRANSFER => 'прием-передача полисов',
        self::STATUS_TERMINATED => 'расторгнут',
        self::STATUS_UNDERWRITING => 'подписан',
    ];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'requests';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
    ];

    /**
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
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
     * Get relation to the files table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function file()
    {
        return $this->morphOne(File::class, 'model');
    }

    /**
     * Get relation to the request_overviews table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function request_overviews()
    {
        return $this->hasMany(RequestOverview::class);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->request_overviews as /* @var $request_overview RequestOverview */ $request_overview) {
            $request_overview->delete();
        }

        if ($this->file) {
            $this->file->delete();
        }

        return parent::delete();
    }
}
