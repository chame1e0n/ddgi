<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyFlow extends Model
{
    use SoftDeletes;

    public const STATUS_PENDING_TRANSFER = 'pending_transfer';
    public const STATUS_REGISTERED = 'registered';
    public const STATUS_REJECTED_TRANSFER = 'rejected_transfer';
    public const STATUS_RETRANFERRED = 'retransferred';
    public const STATUS_TRANSFERRED = 'transferred';

    /**
     * Policy Flow status names.
     * 
     * @var array
     */
    public static $statuses = [
        self::STATUS_PENDING_TRANSFER => 'отложен',     // директор или менеджер или агент отказывается принимать полисы, отправив обратно отправителю
        self::STATUS_REGISTERED => 'зарегистрирован',   // при создании полисов админом
        self::STATUS_REJECTED_TRANSFER => 'отменен',    // директор отказывается принимать полисы, отправив обратно админу
        self::STATUS_RETRANFERRED => 'перераспределен', // директор или менеджер или агент отправляет их кому-то из своей или ниже роли
        self::STATUS_TRANSFERRED => 'распределен',      // админ отправляет их директору или менеджеру или агенту
    ];

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'policy_flow.from_employee_id' => 'required',
        'policy_flow.to_employee_id' => 'required',
        'policy_flow.act_date' => 'required',
    ];

    /**
     * Name of the columns which should not be fillable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'policy_flows';

    /**
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function from_employee()
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
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function to_employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get relation to the files table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }

    /**
     * Overriden save method.
     */
    public function save($options = [])
    {
        $this->policy->status = $this->status;
        $this->policy->save();

        parent::save($options);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->files as /* @var $file File */ $file) {
            $file->delete();
        }

        return parent::delete();
    }
}
