<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowerSportsmanOther extends Model
{
    protected $fillable = [
        "borrower_sportsman_id",
        "other_mark_model",
        "other_name_tools",
        "other_series_number",
        "other_insurance_sum",
        "other_total",
        "other_cover_terror_attacks_sum",
        "other_cover_terror_attacks_currency",
        "cover_terror_attacks_insured_sum",
        "other_cover_terror_attacks_insured_currency",
        "other_coverage_evacuation_cost",
        "other_coverage_evacuation_currency",
        "other_insurance_info",
        "one-sum",
        "one_premia",
        "one_franshiza",
        "tho_sum",
        "two_preim",
        "driver_quantity",
        "driver_one_sum",
        "driver_currency",
        "driver_total_sum",
        "driver_preim_sum",
        "passenger_quantity",
        "passenger_one_sum",
        "passenger_currency",
        "passenger_total_sum",
        "passenger_preim_sum",
        "limit_quantity",
        "limit_one_sum",
        "limit_currency",
        "limit_total_sum",
        "limit_preim_sum",
        "total_liability_limit",
        "total_liability_limit_currency",
        "other_form_policy",
        "other_from_date",
        "other_agent",
        "other_payment",
        "payment_order",
        "other_totally_sum"
    ];
}
