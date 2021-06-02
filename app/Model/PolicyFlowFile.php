<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PolicyFlowFile extends Model
{
    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'policy_flow_files';

    /**
     * Get relation to the policy_flows table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function policy_flow()
    {
        return $this->belongsTo(PolicyFlow::class);
    }
}
