<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Table;
use App\Models\Details;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransCtrl extends Controller
{
    function index(){
        // Query Data Transaksi
        $dtTrans = DB::table("transactions")
        ->join("users","transactions.trans_user_id","=","users.id")
        ->leftJoin("customers","transactions.trans_cus_id","=","customers.id")
        ->select("transactions.*","users.name","customers.cus_nm")
        ->orderBy("status","asc")
        ->paginate(5);

        $data = [
            "title" => "Transactions",
            "dtTrans" => $dtTrans 
        ];

        return view("transaction.data",$data);
    }

    function form(Request $req){
        $data = [
            "title" => "Transaction",
            "dtCat" => Category::All(),
            "dtTable" => Table::All(),
            "dtCus" => Customer::All(),
            "dtMenu" => Menu::All()
        ];

        return view("transaction.form",$data);
    }

    function save(Request $req){
       // dd($req->all());

        $nota = date("ymdhis");
        // Get Next Id Auto Increment tabel transactions
        $cmd = DB::select("SHOW TABLE STATUS LIKE 'transactions'");
        $id_trans = $cmd[0]->Auto_increment;

        // Simpan Ke transaksi
        Transactions::create([
            "trans_nota" => $nota,
            "trans_tgl" => date("Y-m-d h:i:s"),
            "trans_user_id" => Auth::user()->id,
            "trans_cus_id" => $req->input("trans_cus_id") == null ? 0 : $req->input("trans_cus_id"),
            "trans_mj_no" => $req->input("meja"),
            "trans_diskon" => $req->input("diskon"),
            "trans_ppn" => $req->input("ppn"),
            "trans_gtotal" => $req->input("gtotal"),
            "status" => 0
        ]);

        // Simpan Ke Detail
        $mn_id = $req->input("id_menu");
        $mn_harga = $req->input("harga");
        $mn_jumlah = $req->input("jumlah");
        for($i=0;$i<count($mn_id);$i++){
            // Proses Simpan
            Details::create([
                "detail_trans_id" => $id_trans,
                "detail_mn_id" =>  $mn_id[$i],
                "detail_mn_harga" =>  $mn_harga[$i],
                "detail_qty" =>  $mn_jumlah[$i],
                "detail_status" =>  0
            ]);
        }

        $data =[
            "error" => 0,
            "message" => "Data Berhasil Disimpan",
            "id_transaksi" => $id_trans
        ];

        return json_encode($data);

    }

    function nota($id){
        // Query Data Transaksi
        $dtTrans = DB::table("transactions")
        ->join("users","transactions.trans_user_id","=","users.id")
        ->leftJoin("customers","transactions.trans_cus_id","=","customers.id")
        ->select("transactions.*","users.name","customers.cus_nm")
        ->where("transactions.id","=",$id)
        ->first();

        // Query Data Detail
        $dtDetail = DB::table("details")
        ->join("menus","details.detail_mn_id","=","menus.id")
        ->select("details.*","menus.mn_nama",DB::raw("(details.detail_mn_harga * details.detail_qty) as subtotal"))
        ->where("details.detail_trans_id","=",$id)
        ->get();

        $data = [
            "rsTransaksi" => $dtTrans,
            "rsDetail" => $dtDetail,
            "total" => 0
        ];


        return view("transaction.nota",$data);
    }

    function update_status(Request $req){
        Transactions::where("id",$req->id)->update([
            "status" => $req->status
        ]);

        return back();
    }
}