<?php

namespace App\Models\Spravochniki;

use App\Models\Product\AllProduct;
use App\RequestOverview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Models\Policy;

class RequestModel extends Model
{
	use SoftDeletes;

	public $table='requests';
	protected $guarded=[];

	const STATUS = [
			"defective" => "Бракован",
			"cancelling" => "Испорчен", 
			"lost" => "Утерян", 
			"terminated" => "Расторгнут", 
			"policy_transfer" => "Прием-передача полисов", 
			"underwritting" =>"Андеррайтинг"
	];

	const STATE = [
			"В рассмотрении",
			"Отказано",
			"Принят",
	];

	public function user()
	{
		return $this->hasone(User::class, 'id', 'user_id');
	}

	public function policy()
	{
		return $this->hasOne(Policy::class, 'id', 'policy_id');
	}

    public function policySeries()
    {
        return $this->hasOne(PolicySeries::class, 'id', 'policy_series_id');
    }

    public function requestOverview()
    {
        return $this->hasMany(RequestOverview::class, 'request_id', 'id')->with('user');
    }

    static function getAllRequest() {
        $requestModel = new AllProduct;
        return $requestModel->getAllRequestProduct();
    }
}
