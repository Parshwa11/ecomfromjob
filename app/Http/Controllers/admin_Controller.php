<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\admins;
use App\Models\products;

class admin_Controller extends Controller
{
    function login(Request $req)
    {

        // return $req->input();
        $data=$req->input();
        // $email= $req->input('email');
        $email= $data['email'];
        $password= $data['password'];
        // echo $email;


        $user= admins::where(['email'=>$email])->first();
        if(!$user || $password!=$user->password)
        {
            return redirect('admin')->with('status', 'Email or Password is Wrong Please Check!!.');
        }
        else{
         
            $req->session()->put('user',$user);
            return redirect('/adminpanel');

        // $user= admins::where(['email'=>$req->email])->first();
        // if(!$user || $req->password!=$user->password)
        // {
        //     return "Username or password is not matched";
        // }
        // else{
        //     $req->session()->put('user',$user);
        //     return redirect('/');
        }
    }

    function index(request $request)
    {
        $data = DB::select('select * from products');
        return view('index',['products'=>$data]);
    }

    function try()
    {
        $data=products::all();
        return view('try',['products'=>$data]);
        // return view('adminpanel',['products'=>$data]);
    }

    public function exportCsv(Request $request)
{
   $fileName = 'tasks.csv';
   $tasks = Products::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Title', 'Price', 'Description');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Title']  = $task->product_name;
                $row['Price']    = $task->price;
                $row['Description']    = $task->description;
              

                fputcsv($file, array($row['Title'], $row['Price'], $row['Description']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    public function csvOfSearched(Request $request)
    {
        $searched=$request->input('searchedq');
       $fileName = 'tasks.csv';
       $tasks = Products::
       where('product_name', 'like', '%'. $searched .'%')
       ->orWhere('description','LIKE','%'. $searched .'%')
       ->get();
    
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = array('Title', 'Price', 'Description');
    
            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($tasks as $task) {
                    $row['Title']  = $task->product_name;
                    $row['Price']    = $task->price;
                    $row['Description']    = $task->description;
                  
    
                    fputcsv($file, array($row['Title'], $row['Price'], $row['Description']));
                }
    
                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }


        public function csvOfSearchedByPrice(Request $request)
    {
        $start=$request->input('starts');
        $end=$request->input('ends');
       $fileName = 'tasks.csv';
       $tasks =  Products::whereBetween('price',[$start,$end])->get();
    
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = array('Title', 'Price', 'Description');
    
            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($tasks as $task) {
                    $row['Title']  = $task->product_name;
                    $row['Price']    = $task->price;
                    $row['Description']    = $task->description;
                  
    
                    fputcsv($file, array($row['Title'], $row['Price'], $row['Description']));
                }
    
                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }
}
