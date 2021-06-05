<?php

namespace App\Exports;
use Illuminate\Http\Request;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        

        $userid = Session::get('userid');
        return  DB::table('carts')
        ->join('products', 'carts.token', '=', 'products.token')
        ->where('carts.userid',$userid)
        
        ->select('products.id','products.product_name','products.price' , 'products.description','products.token')
        ->get();
    }
}
