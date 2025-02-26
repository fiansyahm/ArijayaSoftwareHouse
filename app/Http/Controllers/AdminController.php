<?php

namespace App\Http\Controllers;
use App\Models\Theme;
use App\Models\Confirmation;
use App\Models\Page;
use App\Models\Song;
use App\Models\Code;
use App\Models\Pendingpayment;
use App\Models\Catalog;
use App\Models\Resume;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function wpadmin(){
        if(Auth::check()){
           return redirect('/admin/dashboard');
        }
        else{
           return redirect('/wpadmin-login');
        }
    }

     public function AdminDashboard(){
         return view('admin.dashboard');
     }

     public function AdminSearch($data){
        return redirect("/admin/resume/list/$data");
    }

    public function AdminList($data)
    {
        if ($data === 'all') {
            $resume = Resume::query();
            $resume = $resume->paginate(10);
        } else {
            $resume = Resume::where('id', 'like', '%' . $data . '%')
                ->orWhere('nickname', 'like', '%' . $data . '%')
                ->orWhere('fullname', 'like', '%' . $data . '%');
            $resume = $resume->paginate(10);
        }
    
        return view('admin-resume.list-resume', ['resume' => $resume]);
    }
    
     public function AdminEdit($id){
        $resume = Resume::find($id);
        return view('admin-resume.edit-resume-admin',['resume'=>$resume]);
     }

     public function AdminDelete($id){
         $resume = Cache::remember('resume_' . $id, 60, function () use ($id) {
            return Resume::find($id);
         });
         if(Auth::check()&& Auth::user()->isAdmin=='1'){
            $resume->delete();
            return redirect()->back()->with('status', 'Data Sukses Dihapus');
         }
         else{
            return redirect()->back()->with('status', 'Data Gagal Dihapus');
         }
      }

      public function UserEdit($id, $nickname, $fullname){
        $name1 = ucwords($nickname);
        $resume = Resume::all()->where('id', $id)->where('nickname', $name1);
        if(count($resume)>0){
         // nanti diganti ya,buatin sendiri
            $resume = Resume::all()->where('id', $id)->first();
            return view('admin-resume.edit-resume-user',['resume'=>$resume]);
        }
        else{
            return "Data Tidak Ditemukan";
        }
    }

}
