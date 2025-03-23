<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        if(Auth::user()->isAdmin != 2)return 'Access Denied';
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        if(Auth::user()->isAdmin != 2)return 'Access Denied';
        return view('orders.create');
    }

    public function store(Request $request)
    {
        if(Auth::user()->isAdmin != 2)return 'Access Denied';
        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function edit(Order $order)
    {
        if(Auth::user()->isAdmin != 2)return 'Access Denied';
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        if(Auth::user()->isAdmin != 2)return 'Access Denied';
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        if(Auth::user()->isAdmin != 2)return 'Access Denied';
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }

    public function getPO($id){
        if(Auth::user()->isAdmin != 2)return 'Access Denied';
        $order = Order::find($id);
        $customer_name = $order->customer_name;
        $list_features = $order->main_features;
        $cost = $order->cost;

        $purchase_order = 'PURCHASE ORDER (PO)
    
        Perusahaan Developer: CV ARIJAYA MERDEKA
        
        Pihak Pengorder: M.Asy`ari  ( PT Plumbon Jaya Abadi )

        Total Biaya: Rp 3.500.000
        
        
        * Fitur utama:
        
        * Booking
        
        * Sedang dikerjakan
        
        * Sudah selesai
        
        * Estimasi pengerjaan: 2-4 minggu (dapat bertambah jika terdapat revisi, perubahan fitur, atau kendala lain)
        
        * Penambahan Fitur:
        
        Penambahan fitur selain yang tertulis dalam detail aplikasi dapat dilakukan setelah aplikasi selesai, jika diinginkan untuk upgrade di masa mendatang
        
        
        Ketentuan:
        
        - Developer tidak bertanggung jawab atas tuntutan hukum terkait penggunaan aplikasi setelah diserahkan kepada pihak pengorder.
        
        - Perubahan kebutuhan yang signifikan di luar spesifikasi awal dapat berpengaruh pada jadwal dan biaya pengerjaan.
        
        - Jika ada revisi atau perubahan besar yang tidak termasuk dalam kesepakatan awal, maka akan dikenakan biaya tambahan.
        
        Developer tidak bertanggung jawab atas permasalahan pihak ketiga (misalnya: layanan hosting, API pihak ketiga, atau platform pembayaran) yang dapat mempengaruhi kinerja aplikasi. 
        
        
        Dengan ini, pihak pengorder menyetujui ketentuan dan biaya yang telah ditetapkan.';
        
        $purchase_order=$purchase_order.'\n\nUbah Pihak Pengorder menjadi '.$customer_name.',ubah fitur menjadi '.$list_features.',ubah Total Biaya menjadi '.$cost;
        // $purchase_order='Nama nama hewan karnivora contohnya';
        $gemini=new GeminiController();
        $generatedContent = $gemini->getGeminiReplay(htmlspecialchars($purchase_order));
        return view('orders.getpo',['getpo' => $generatedContent]);
    
    }
    


}
