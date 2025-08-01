<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function sendWA($number,$message){
        $result = DB::table('whatsapp_chats')->insert([
            'phone' => $number,
            'type' => 'outgoing',
            'media' => 'text',
            'message' => $message,
            'status' =>'pending',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return $result;
     }

     function encryptPhone($phone, $key = "secretkey") {
        $result = '';
        $keyLength = strlen($key);

        for ($i = 0; $i < strlen($phone); $i++) {
            $charCode = ord($phone[$i]) + ord($key[$i % $keyLength]);
            $result .= chr($charCode);
        }

        return base64_encode($result);
    }

    function decryptPhone($encrypted, $key = "secretkey") {
        $text = base64_decode($encrypted);
        $result = '';
        $keyLength = strlen($key);

        for ($i = 0; $i < strlen($text); $i++) {
            $charCode = ord($text[$i]) - ord($key[$i % $keyLength]);
            $result .= chr($charCode);
        }

        return $result;
    }


    public function index()
    {
        $orders = Order::all()->map(function ($order) {
            $order->phone = $this->encryptPhone($order->phone);
            return $order;
        });

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'phone' => '62' . ltrim($request->phone, '0') // hilangkan 0 jika perlu
        ]);
        $order = Order::create($request->all());

        $message = "📝 *Detail Order Baru:*\n";
        $message .= "*Customer:* " . $request->customer_name . "\n";
        $message .= "*Jenis Aplikasi:* " . $request->application_type . "\n";
        $message .= "*Fitur Utama:* " . $request->main_features . "\n";
        
        // Kalau kolom notes boleh kosong
        $message .= "*Catatan:* " . ($request->notes ?? '-') . "\n";

        // Kirim ke WhatsApp
        $this->sendWA($request->phone, $message);

        return redirect()->back()->with('success', 'Purchase Order Sukses Dibuat, Silahkan Chat Admin Untuk Konfirmasi!');
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
        if (!in_array(Auth::user()->isAdmin, [2, 3])) return 'Access Denied';
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
