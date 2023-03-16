<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportCtrl extends Controller
{
    function rpt_transaction(){
        $dtTrans = DB::table("transactions")
        ->join("users","transactions.trans_user_id","=","users.id")
        ->leftJoin("customers","transactions.trans_cus_id","=","customers.id")
        ->select("transactions.*","users.name","customers.cus_nm")
        ->get();

        $data = [
            "dtTrans" => $dtTrans,
            "total" => 0
        ];

        return view("report.rpt_transaction",$data);
    }
}