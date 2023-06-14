<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIMenuCtrl extends Controller
{
    function getAll(Request $req)
    {
        //$menu = Menu::All();

        $sql = "SELECT menus.*,categories.cat_nm FROM menus INNER JOIN categories ON menus.mn_cat_id = categories.id";

        if ($req->id_cat) {
            $sql .= " WHERE menus.mn_cat_id = " . $req->id_cat;
        }

        $menu = DB::select($sql); 
        
        $nmenu = collect($menu);
        
        $nmenu->map(function($item){
            if ($item->foto == "") {
                return $item->foto = asset("images/no-image.webp");
            } else {
            return $item->foto = asset($item->foto);
            }
        });
        
        return json_encode($nmenu);
    }

    function getFavorit()
    {
        $menu = DB::select("SELECT menus.*,categories.cat_nm,SUM(details.detail_qty) AS jml FROM menus 
        INNER JOIN details ON details.detail_mn_id = menus.id
        INNER JOIN categories ON menus.mn_cat_id = categories.id
        GROUP BY menus.id,menus.mn_kd,categories.cat_nm,menus.mn_nama,menus.mn_cat_id,menus.mn_harga,menus.mn_satuan,menus.mn_stok,menus.mn_kitc_id,menus.mn_desc,menus.foto,menus.created_at,menus.updated_at 
        ORDER BY jml 
        DESC LIMIT 0,10");
        
        $nmenu = collect($menu);
        
        $nmenu->map(function($item){
            return $item->foto = asset($item->foto);
        });
        
        return json_encode($nmenu);
    }

    function getCategory()
    {
        $cat = Category::All();

        return response()->json($cat);
    }
}
