<?php

namespace App\Models\Spravochniki;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
