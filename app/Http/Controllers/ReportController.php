<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Model\Contract;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\Region;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a report about of signed contracts by regions.
     *
     * @return \Illuminate\Http\Response
     */
    public function regions(Request $request)
    {
        $request->validate([
            'regions.from' => ['nullable', 'required_with:regions.to', 'date'],
            'regions.to' => ['nullable', 'required_with:regions.from', 'date'],
            'regions.action' => ['nullable', 'required_with:regions.from,regions.to'],
        ]);

        $report = [ 1 => [], 2 => [] ];
        $from = $request->input('regions.from');
        $to = $request->input('regions.to');
        $action = $request->input('regions.action', 'filter');
        $regions = Region::all();

        if ($from && $to) {
            $connection = DB::connection();

            $all_contracts = [];

            $active_contracts = $connection->select('SELECT contracts.id AS contract_id, contracts.type AS contract_type, regions.id AS region_id '
                                                  . 'FROM contracts '
                                                  . 'INNER JOIN policies ON (contracts.id = policies.contract_id AND policies.deleted_at IS NULL) '
                                                  . 'INNER JOIN policy_flows ON (policies.id = policy_flows.policy_id AND policy_flows.deleted_at IS NULL) '
                                                  . 'INNER JOIN employees ON (policy_flows.to_employee_id = employees.id AND employees.deleted_at IS NULL) '
                                                  . 'INNER JOIN branches ON (employees.branch_id = branches.id AND branches.deleted_at IS NULL) '
                                                  . 'INNER JOIN regions ON (branches.region_id = regions.id AND regions.deleted_at IS NULL) '
                                                  . 'WHERE contracts.from < :from AND contracts.to >= :to AND contracts.deleted_at IS NULL',
                ['from' => $from, 'to' => $to]
            );

            foreach($active_contracts as /* @var $active_contract \stdClass */ $active_contract) {
                $all_contracts[] = $active_contract->contract_id;

                $report[1]['active'][$active_contract->region_id][$active_contract->contract_type][$active_contract->contract_id] = 1;
            }

            $signed_contracts = $connection->select('SELECT contracts.id AS contract_id, contracts.type AS contract_type, regions.id AS region_id '
                                                  . 'FROM contracts '
                                                  . 'INNER JOIN policies ON (contracts.id = policies.contract_id AND policies.deleted_at IS NULL) '
                                                  . 'INNER JOIN policy_flows ON (policies.id = policy_flows.policy_id AND policy_flows.deleted_at IS NULL) '
                                                  . 'INNER JOIN employees ON (policy_flows.to_employee_id = employees.id AND employees.deleted_at IS NULL) '
                                                  . 'INNER JOIN branches ON (employees.branch_id = branches.id AND branches.deleted_at IS NULL) '
                                                  . 'INNER JOIN regions ON (branches.region_id = regions.id AND regions.deleted_at IS NULL) '
                                                  . 'WHERE contracts.from >= :from_from AND contracts.from < :from_to AND contracts.to > :to_from AND contracts.deleted_at IS NULL',
                ['from_from' => $from, 'from_to' => $to, 'to_from' => $from]
            );

            foreach($signed_contracts as /* @var $signed_contract \stdClass */ $signed_contract) {
                $all_contracts[] = $signed_contract->contract_id;

                $report[1]['signed'][$signed_contract->region_id][$signed_contract->contract_type][$signed_contract->contract_id] = 1;
            }

            $contracts = Contract::with(['policies'])->whereIn('id', $all_contracts)->get();

            foreach($report[1] as $report_type => $report_regions) {
                foreach($report_regions as $report_region_id => $report_contract_types) {
                    foreach($report_contract_types as $report_contract_type => $report_contract_ids) {
                        foreach($report_contract_ids as $report_contract_id => $nothing) {
                            $contract = $contracts->where('id', $report_contract_id)->first();

                            $insurance_sum = $premium_sum = 0;
                            foreach($contract->policies as /* @var $policy Policy */ $policy) {
                                $insurance_sum += $policy->insurance_sum;
                                $premium_sum += $policy->insurance_premium;
                            }

                            $report[2]['active'][$report_region_id][$report_contract_type] = $premium_sum;
                            $report[3]['active'][$report_region_id][$report_contract_type] = $insurance_sum;
                            $report[4]['specification'][$report_region_id][$contract->specification_id] = 1;
                        }
                    }
                }
            }

            foreach(Employee::with(['branch'])->get() as /* @var $employee Employee */ $employee) {
                $period_from = strtotime($from);
                $period_to = strtotime($to);
                $employee->work_start_date = strtotime($employee->work_start_date);
                $employee->work_end_date = is_null($employee->work_end_date) ? time() : strtotime($employee->work_end_date);

                if (
                    ($employee->role != Employee::ROLE_AGENT) &&
                    (
                        ($employee->work_start_date <= $period_from && $employee->work_end_date >= $period_to) ||
                        ($employee->work_start_date > $period_from && $employee->work_start_date < $period_to && $employee->work_end_date > $period_to)
                    )
                ) {
                    $report[4]['employee'][$employee->branch->region_id][$employee->id] = 1;
                }
            }

            $agency_fees = $connection->select('SELECT policies.id AS policy_id, regions.id AS region_id '
                                             . 'FROM contracts '
                                             . 'INNER JOIN policies ON (contracts.id = policies.contract_id AND policies.deleted_at IS NULL) '
                                             . 'INNER JOIN policy_flows ON (policies.id = policy_flows.policy_id AND policy_flows.deleted_at IS NULL) '
                                             . 'INNER JOIN employees ON (policy_flows.to_employee_id = employees.id AND employees.deleted_at IS NULL) '
                                             . 'INNER JOIN branches ON (employees.branch_id = branches.id AND branches.deleted_at IS NULL) '
                                             . 'INNER JOIN regions ON (branches.region_id = regions.id AND regions.deleted_at IS NULL) '
                                             . 'WHERE contracts.from < :from AND contracts.to >= :to AND contracts.deleted_at IS NULL AND employees.role = :role AND policies.polis_from_date < :policy_from AND policies.polis_to_date >= :policy_to',
                ['from' => $from, 'to' => $to, 'role' => 'agent', 'policy_from' => $from, 'policy_to' => $to]
            );

            $policies = [];
            foreach($agency_fees as /* @var $agency_fee \stdClass */ $agency_fee) {
                $policy = isset($policies[$agency_fee->policy_id]) ? $policies[$agency_fee->policy_id] : Policy::find($agency_fee->policy_id);

                if (isset($report[4][$agency_fee->region_id])) {
                    $report[4][$agency_fee->region_id] += $policy->insurance_premium;
                } else {
                    $report[4][$agency_fee->region_id] = $policy->insurance_premium;
                }

                $policies[$agency_fee->policy_id] = $policy;
            }
        }

//        if ($action == 'filter') {
            return view('reports.regions', [
                'regions' => $regions,
                'from' => $from,
                'to' => $to,
                'report' => $report,
            ]);
/*
        } elseif ($action == 'report-1') {
            $fp = fopen('php://temp', 'w+');

            header('Content-Disposition: attachment; filename="regions.csv"');
            header('Content-Type: text/csv');

            $header = [
                'Наименование регионов',
                'Кол-во договоров страхования действующих на отчетную дату для юр.лица',
                'Кол-во договоров страхования действующих на отчетную дату для физ.лица',
                'Кол-во договоров страхования в т.ч. в сельской местности для юр.лица',
                'Кол-во договоров страхования в т.ч. в сельской местности для физ.лица',
                'Кол-во договоров страхования заключенных за отчетный период для юр.лица',
                'Кол-во договоров страхования заключенных за отчетный период для физ.лица',
                'Кол-во договоров страхования в т.ч. в сельской местности для юр.лица',
                'Кол-во договоров страхования в т.ч. в сельской местности для физ.лица',
            ];

            $header = array_map(function ($item) {
                return mb_convert_encoding($item, 'windows-1251');
            }, $header);
            
            fputcsv($fp, $header, ';');

            $active_legal_total = 0;
            $active_individual_total = 0;
            $signed_legal_total = 0;
            $signed_individual_total = 0;

            foreach($regions as $region) {
                $active_legal = isset($report[1]['active'][$region->id][Contract::TYPE_LEGAL]) ? count($report[1]['active'][$region->id][Contract::TYPE_LEGAL]) : 0;
                $active_individual = isset($report[1]['active'][$region->id][Contract::TYPE_INDIVIDUAL]) ? count($report[1]['active'][$region->id][Contract::TYPE_INDIVIDUAL]) : 0;
                $signed_legal = isset($report[1]['signed'][$region->id][Contract::TYPE_LEGAL]) ? count($report[1]['signed'][$region->id][Contract::TYPE_LEGAL]) : 0;
                $signed_individual = isset($report[1]['signed'][$region->id][Contract::TYPE_INDIVIDUAL]) ? count($report[1]['signed'][$region->id][Contract::TYPE_INDIVIDUAL]) : 0;

                $row = [$region->name, $active_legal, $active_individual, '', '', $signed_legal, $signed_individual, '', ''];

                $active_legal_total += $active_legal;
                $active_individual_total += $active_individual;
                $signed_legal_total += $signed_legal;
                $signed_individual_total += $signed_individual;

                $row = array_map(function ($item) {
                    return mb_convert_encoding($item, 'windows-1251');
                }, $row);

                fputcsv($fp, $row, ';');
            }

            $footer = ['Всего:', $active_legal_total, $active_individual_total, '', '', $signed_legal_total, $signed_individual_total, '', ''];

            $footer = array_map(function ($item) {
                return mb_convert_encoding($item, 'windows-1251');
            }, $footer);

            fputcsv($fp, $footer, ';');

            rewind($fp);

            $csv_contents = stream_get_contents($fp);

            fclose($fp);

            echo $csv_contents;
        }
*/
    }
}
