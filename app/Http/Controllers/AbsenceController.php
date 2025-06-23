<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use App\Models\Absence;
use App\Models\Absent;
use App\Models\Schedule;
use App\Models\Holiday;
use App\Models\Gmeet;
use App\Models\Templatereport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AbsenceController extends Controller
{

    public function deleteRedudantAbsence(){
        // Mendapatkan semua data absensi
        $data_absensi = Absence::all();

        // Membuat array untuk menyimpan id yang sudah diperiksa
        $checked_ids = array();

        // Array untuk menyimpan data absensi yang valid (tanpa duplikat)
        $absensi_valid = array();

        foreach ($data_absensi as $data) {
            // Mengonversi waktu menjadi objek Carbon
            $waktu = Carbon::parse($data->waktu);
            
            // Memotong tanggal dan hanya menyimpan bagian tanggal
            $tanggal = $waktu->toDateString();
            
            // Pemeriksaan apakah id_absence, jenis absen, dan tanggal sama dengan data lain yang sudah diperiksa
            $key = $data->id_absence . '_' . $data->jenis_absen . '_' . $tanggal;
            
            // Jika data sudah diperiksa sebelumnya dan sudah ada dalam array, maka lewati dan lanjutkan ke data berikutnya
            if (in_array($key, $checked_ids)) {
                // delete data
                $data->delete();
                continue;
            }

            // Menambahkan id ke dalam array checked_ids
            $checked_ids[] = $key;
            
            // Menambahkan data ke dalam array absensi_valid
            $absensi_valid[] = $data;
        }

    }

    public function deleteRedudantAbsent(){
        // Mendapatkan semua data absensi
        $data_absensi = Absent::all();

        // Membuat array untuk menyimpan id yang sudah diperiksa
        $checked_ids = array();

        // Array untuk menyimpan data absensi yang valid (tanpa duplikat)
        $absensi_valid = array();

        foreach ($data_absensi as $data) {
            // Mengonversi waktu menjadi objek Carbon
            $waktu = Carbon::parse($data->waktu);
            
            // Memotong tanggal dan hanya menyimpan bagian tanggal
            $tanggal = $waktu->toDateString();
            
            // Pemeriksaan apakah id_absence, jenis absen, dan tanggal sama dengan data lain yang sudah diperiksa
            $key = $data->id_absence . '_' . $data->jenis_absen . '_' . $tanggal;
            
            // Jika data sudah diperiksa sebelumnya dan sudah ada dalam array, maka lewati dan lanjutkan ke data berikutnya
            if (in_array($key, $checked_ids)) {
                // delete data
                $data->delete();
                continue;
            }

            // Menambahkan id ke dalam array checked_ids
            $checked_ids[] = $key;

            // Menambahkan data ke dalam array absensi_valid
            $absensi_valid[] = $data;
        }

    }

    public function deleteRedudant(){
        $this->deleteRedudantAbsence();
        $this->deleteRedudantAbsent();
    }

    public function index($day, $month, $year, $jenis_absen)
    {
        $users=User::all();
        $this->deleteRedudant();
        $absences=null;
        $absents=Absent::all()->where('waktu', '>=' , $year.'-'.$month.'-'.$day.' 00:00:00')->where('waktu', '<=' , $year.'-'.$month.'-'.$day.' 23:59:59');
        foreach ($absents as $absent) {
            $absent->nama_user = User::find($absent->id_absence)->name;
        }

        $new_absents = array();
        foreach ($absents as $absent) {
            if(Auth::user()->id!=1){
                $user=$users->where('id',$absent['id_absence'])->first();
                if($user==null||$user->isAdmin==3)continue;
            }
            $new_absents[$absent->nama_user][] = $absent;
        }


        if($jenis_absen=='all'){
            $absences=Absence::all()->where('waktu', '>=' , $year.'-'.$month.'-'.$day.' 00:00:00')->where('waktu', '<=' , $year.'-'.$month.'-'.$day.' 23:59:59');
        }
        else{
            $absences=Absence::all()->where('waktu', '>=' , $year.'-'.$month.'-'.$day.' 00:00:00')->where('waktu', '<=' , $year.'-'.$month.'-'.$day.' 23:59:59')->where('jenis_absen', $jenis_absen);
        }
        foreach ($absences as $absence) {
            $absence->nama_user = User::find($absence->id_absence)->name;
        }

        $new_absences = array();
        foreach ($absences as $absence) {
            if(Auth::user()->id!=1){
                $user=$users->where('id',$absence['id_absence'])->first();
                if($user==null||$user->isAdmin==3)continue;
            }
            $new_absences[$absence->nama_user][] = $absence;
        }


        return view('absence.index', ['absences_arr' => $new_absences,'absents_arr' => $new_absents, 'day' => $day, 'month' => $month, 'year' => $year, 'jenis_absen' => $jenis_absen]);
    }

    public function active_schedule_process($active_schedule)
    {
        $arrival_time_1_start_hour = substr($active_schedule->arrival_time_1_start, 0, 2);
        $arrival_time_1_start_minute = substr($active_schedule->arrival_time_1_start, 3, 2);
        if($arrival_time_1_start_hour[0] == '0'){
            $arrival_time_1_start_hour = substr($arrival_time_1_start_hour, 1, 1);
        }
        if($arrival_time_1_start_minute[0] == '0'){
            $arrival_time_1_start_minute = substr($arrival_time_1_start_minute, 1, 1);
        }

        $arrival_time_1_end_hour = substr($active_schedule->arrival_time_1_end, 0, 2);
        $arrival_time_1_end_minute = substr($active_schedule->arrival_time_1_end, 3, 2);
        if($arrival_time_1_end_hour[0] == '0'){
            $arrival_time_1_end_hour = substr($arrival_time_1_end_hour, 1, 1);
        }
        if($arrival_time_1_end_minute[0] == '0'){
            $arrival_time_1_end_minute = substr($arrival_time_1_end_minute, 1, 1);
        }

        $arrival_time_2_start_hour = substr($active_schedule->arrival_time_2_start, 0, 2);
        $arrival_time_2_start_minute = substr($active_schedule->arrival_time_2_start, 3, 2);
        if($arrival_time_2_start_hour[0] == '0'){
            $arrival_time_2_start_hour = substr($arrival_time_2_start_hour, 1, 1);
        }
        if($arrival_time_2_start_minute[0] == '0'){
            $arrival_time_2_start_minute = substr($arrival_time_2_start_minute, 1, 1);
        }

        $arrival_time_2_end_hour = substr($active_schedule->arrival_time_2_end, 0, 2);
        $arrival_time_2_end_minute = substr($active_schedule->arrival_time_2_end, 3, 2);
        if($arrival_time_2_end_hour[0] == '0'){
            $arrival_time_2_end_hour = substr($arrival_time_2_end_hour, 1, 1);
        }
        if($arrival_time_2_end_minute[0] == '0'){
            $arrival_time_2_end_minute = substr($arrival_time_2_end_minute, 1, 1);
        }

        $departure_time_1_start_hour = substr($active_schedule->departure_time_1_start, 0, 2);
        $departure_time_1_start_minute = substr($active_schedule->departure_time_1_start, 3, 2);
        if($departure_time_1_start_hour[0] == '0'){
            $departure_time_1_start_hour = substr($departure_time_1_start_hour, 1, 1);
        }
        if($departure_time_1_start_minute[0] == '0'){
            $departure_time_1_start_minute = substr($departure_time_1_start_minute, 1, 1);
        }

        $departure_time_1_end_hour = substr($active_schedule->departure_time_1_end, 0, 2);
        $departure_time_1_end_minute = substr($active_schedule->departure_time_1_end, 3, 2);
        if($departure_time_1_end_hour[0] == '0'){
            $departure_time_1_end_hour = substr($departure_time_1_end_hour, 1, 1);
        }
        if($departure_time_1_end_minute[0] == '0'){
            $departure_time_1_end_minute = substr($departure_time_1_end_minute, 1, 1);
        }

        $departure_time_2_start_hour = substr($active_schedule->departure_time_2_start, 0, 2);
        $departure_time_2_start_minute = substr($active_schedule->departure_time_2_start, 3, 2);
        if($departure_time_2_start_hour[0] == '0'){
            $departure_time_2_start_hour = substr($departure_time_2_start_hour, 1, 1);
        }
        if($departure_time_2_start_minute[0] == '0'){
            $departure_time_2_start_minute = substr($departure_time_2_start_minute, 1, 1);
        }

        $departure_time_2_end_hour = substr($active_schedule->departure_time_2_end, 0, 2);
        $departure_time_2_end_minute = substr($active_schedule->departure_time_2_end, 3, 2);
        if($departure_time_2_end_hour[0] == '0'){
            $departure_time_2_end_hour = substr($departure_time_2_end_hour, 1, 1);
        }
        if($departure_time_2_end_minute[0] == '0'){
            $departure_time_2_end_minute = substr($departure_time_2_end_minute, 1, 1);
        }

       // Casting to int
        $active_schedule->arrival_time_1_start_hour = intval($arrival_time_1_start_hour);
        $active_schedule->arrival_time_1_start_minute = intval($arrival_time_1_start_minute);
        $active_schedule->arrival_time_1_end_hour = intval($arrival_time_1_end_hour);
        $active_schedule->arrival_time_1_end_minute = intval($arrival_time_1_end_minute);
        $active_schedule->arrival_time_2_start_hour = intval($arrival_time_2_start_hour);
        $active_schedule->arrival_time_2_start_minute = intval($arrival_time_2_start_minute);
        $active_schedule->arrival_time_2_end_hour = intval($arrival_time_2_end_hour);
        $active_schedule->arrival_time_2_end_minute = intval($arrival_time_2_end_minute);
        $active_schedule->departure_time_1_start_hour = intval($departure_time_1_start_hour);
        $active_schedule->departure_time_1_start_minute = intval($departure_time_1_start_minute);
        $active_schedule->departure_time_1_end_hour = intval($departure_time_1_end_hour);
        $active_schedule->departure_time_1_end_minute = intval($departure_time_1_end_minute);
        $active_schedule->departure_time_2_start_hour = intval($departure_time_2_start_hour);
        $active_schedule->departure_time_2_start_minute = intval($departure_time_2_start_minute);
        $active_schedule->departure_time_2_end_hour = intval($departure_time_2_end_hour);
        $active_schedule->departure_time_2_end_minute = intval($departure_time_2_end_minute);

        return $active_schedule;
        
    }

    public function create()
    {
        $active_schedule_raw = Schedule::where('isActive', 1)->first(); // Mengubah pemanggilan metode
        $active_schedule = $this->active_schedule_process($active_schedule_raw);
        $users = User::all();
        return view('absence.create', ['users' => $users, 'active_schedule' => $active_schedule]);
    }

    public function store(Request $request)
    {
        $absence = new Absence;
        $absence->id_absence = $request->id_absence;
        $absence->jenis_absen = $request->jenis_absen;
        $absence->status_absen = $request->status_absen;
        $absence->waktu = $request->waktu;
        $absence->posisi_absen = $request->posisi_absen;
        $absence->save();

        $day = date('d');
        $month = date('m');
        $year = date('Y');
        // cek login
        // if(Auth::check()){
        //     return redirect('/absence'.'/'.$day.'/'.$month.'/'.$year.'/'.'Masuk');
        // }
        // else{
        return redirect()->back()->with('status', 'Absen berhasil disimpan');
        // }
    }

    public function create1()
    {
        $active_schedule_raw = Schedule::where('isActive', 1)->first(); // Mengubah pemanggilan metode
        $active_schedule = $this->active_schedule_process($active_schedule_raw);
        $users = User::all();
        return view('absence.create1', ['users' => $users, 'active_schedule' => $active_schedule]);
    }

    public function absent(){
        $users = User::all();
        return view('absence.absent', ['users' => $users]);
    }

    public function store_absent(Request $request)
    {
        $absence = new Absent;
        $absence->id_absence = $request->id_absence;
        $absence->jenis_absen = $request->jenis_absen;
        $absence->reason_absen = $request->reason_absen;
        $absence->waktu = $request->waktu;
        $absence->save();
        // redirect back
        return redirect()->back()->with('status', 'Absen berhasil disimpan');
    }

    public function report()
    {
        $users = User::all();
        $id_user=Auth::user()->id;
        $templatereport=Templatereport::all()->where('id_absence',$id_user)->first();
        return view('absence.report', ['users' => $users,'templatereport'=>$templatereport]);
    }

    public function store_report(Request $request)
    {
        $report = new Report;
        $report->id_absence = $request->id_absence;
        $report->description = $request->description;
        $report->waktu = $request->waktu;
        $report->save();
        // redirect back
        $thecurrentdate = date('d/m/Y');
        $redirect = '/absence/report/list/' . $thecurrentdate . '/all';
        return redirect($redirect)->with('status', 'Laporan berhasil disimpan');
    }

    public function list_report($day, $month, $year, $jenis_absen)
    {
        $reports = Report::all()->where('waktu', '>=' , $year.'-'.$month.'-'.$day.' 00:00:00')->where('waktu', '<=' , $year.'-'.$month.'-'.$day.' 23:59:59');
        $users=User::all();
        foreach ($reports as $key => $report) {
            $user = $users->where('id', $report['id_absence'])->first();
            if(Auth::user()->id!=1){
                if($user == null || $user->isAdmin == 3){
                    unset($reports[$key]); // hanya hapus dari koleksi, tidak dari database
                    continue;
                }
            }
            $report->nama_user = $user->name;
        }
        return view('absence.list_report', ['reports' => $reports, 'day' => $day, 'month' => $month, 'year' => $year, 'jenis_absen' => $jenis_absen]);
    }

    public function absence_calender(){
        $users=User::all();
        $abseces = Absence::all();
        // Membuat array untuk menyimpan data tanggal dan jumlah hadir
        $attendance_data = array();

        // Loop melalui data JSON
        foreach ($abseces as $entry) {
            if(Auth::user()->id!=1){
                $user=$users->where('id',$entry['id_absence'])->first();
                if($user==null||$user->isAdmin==3)continue;
            }
            // Mendapatkan tanggal dari waktu absen
            $date = date("Y-m-d", strtotime($entry['waktu']));

            // Menambahkan atau mengupdate jumlah hadir untuk tanggal tertentu
            if (array_key_exists($date, $attendance_data)) {
                $attendance_data[$date] += ($entry['jenis_absen'] === 'Masuk') ? 1 : 0;
            } else {
                $attendance_data[$date] = ($entry['jenis_absen'] === 'Masuk') ? 1 : 0;
            }
        }

        // Mengkonversi array data hadir ke dalam format yang diinginkan
        $result = array();
        foreach ($attendance_data as $date => $attendance) {
            $result[] = array(
                'title' => 'Hadir: ' . $attendance,
                'start' => $date,
                'end' => $date,
                'color' => ($attendance > 0) ? 'green' : 'red'
            );

        }
        return $result;

    }

    public function absence_shift() {
        // Mendapatkan semua pengguna (users)
        $users = User::all();
        
        // Mengonversi array pengguna ke dalam format yang lebih mudah diakses
        $users_array = [];
        foreach ($users as $user) {
            $users_array[$user->id] = [
                'id' => $user->id,
                'name' => $user->name,
                'position' => $user->position,
            ];
        }
    
        // Mendapatkan semua data absen
        $abseces = Absence::all();
    
        // Membuat array untuk menyimpan data kehadiran
        $attendance_data = [];
    
        // Loop melalui data absen
        foreach ($abseces as $entry) {
            if(Auth::user()->id!=1){
                $user=$users->where('id',$entry['id_absence'])->first();
                if($user==null||$user->isAdmin==3)continue;
            }
            // Mendapatkan tanggal dari waktu absen
            $date = date("Y-m-d", strtotime($entry->waktu));
    
            // Memproses data absen berdasarkan jenisnya
            if ($entry->jenis_absen === 'Masuk') {
                // Memeriksa apakah id_absence ada dalam $users_array
                if (isset($users_array[$entry->id_absence])) {
                    $user_name = $users_array[$entry->id_absence]['name'];
                    $user_position = $users_array[$entry->id_absence]['position'];
    
                    // Membuat ID gabungan dari id_absence dan tanggal
                    $id = $entry->id_absence . '_' . $date;
    
                    // Menyimpan data kehadiran
                    $attendance_data[$id]['title'] = $user_name . ' (' . $user_position . ')';
                    $attendance_data[$id]['start'] = date("Y-m-d\TH:i:s", strtotime($entry->waktu));
                    $attendance_data[$id]['end'] = $attendance_data[$id]['start'];
                    // Menentukan warna berdasarkan posisi pengguna
                    if ($user_position == 'CS SHOPEE') {
                        $attendance_data[$id]['color'] = 'orange';
                    } elseif ($user_position == 'CS WA') {
                        $attendance_data[$id]['color'] = 'green';
                    } else {
                        $attendance_data[$id]['color'] = 'blue';
                    }
                }
            } elseif ($entry->jenis_absen === 'Pulang') {
                // Jika jenis absen adalah pulang, maka update waktu akhir (end)
                $id = $entry->id_absence . '_' . $date;
                if (isset($attendance_data[$id])) {
                    $attendance_data[$id]['end'] = date("Y-m-d\TH:i:s", strtotime($entry->waktu));
                }
            }
        }
    
        // Mengkonversi array data kehadiran ke dalam format yang diinginkan untuk FullCalendar
        $result = [];
        foreach ($attendance_data as $id => $item) {
            // Memastikan setiap entri memiliki start dan end yang valid
            if (isset($item['start']) && isset($item['end'])) {
                $result[] = [
                    'title' => $item['title'],
                    'start' => $item['start'],
                    'end' => $item['end'],
                    'color' => $item['color'],
                ];
            }
        }
    
        return $result;
    }
    

    public function absent_calender(){
        $absents = Absent::all();
        $users = User::all();

        // Inisialisasi array untuk menyimpan tanggal dan jumlah jenis absen
        $absences = array();

        // Menghitung jumlah jenis absen berdasarkan tanggal
        foreach ($absents as $item) {
            if(Auth::user()->id!=1){
                $user=$users->where('id',$item['id_absence'])->first();
                if($user==null||$user->isAdmin==3)continue;
            }
            // Mengambil tanggal dari waktu absen
            $tanggal = date('Y-m-d', strtotime($item['waktu']));

            // Jika tanggal belum ada dalam array, inisialisasi jumlah jenis absen menjadi 0
            if (!isset($absences[$tanggal][$item['jenis_absen']])) {
                $absences[$tanggal][$item['jenis_absen']] = 0;
            }

            // Menambahkan jumlah jenis absen
            $absences[$tanggal][$item['jenis_absen']]++;
        }

        // Mengonversi data ke format yang diinginkan
        $result = array();
        foreach ($absences as $tanggal => $jenis_absen) {
            $jumlah_hadir = isset($jenis_absen['Izin']) ? $jenis_absen['Izin'] : 1;
            $result[] = array(
                'title' => 'Izin/Sakit: ' . $jumlah_hadir,
                'start' => $tanggal,
                'end' => $tanggal,
                'color' => ($jumlah_hadir > 0) ? 'gold' : 'red'
            );
        }

        return $result;

    }

    public function report_calender(){
        $reports = Report::all();
        $users = User::all();
        // Initialize associative array to store counts
        $id_report_counts = [];

        // Loop through the data
        foreach ($reports as $entry) {
            if(Auth::user()->id!=1){
                $user=$users->where('id',$entry['id_absence'])->first();
                if($user==null||$user->isAdmin==3)continue;
            }
            // Extract tanggal dari waktu
            $tanggal = date('Y-m-d', strtotime($entry['waktu']));

            // Increment count for id_absence
            $id_absence = $entry['id_absence'];
            if (isset($id_report_counts[$tanggal])) {
                $id_report_counts[$tanggal]++;
            } else {
                $id_report_counts[$tanggal] = 1;
            }
        }

        // Sort the id_absence counts in descending order
        arsort($id_report_counts);

        // Mengonversi data ke dalam format yang diinginkan
        $result = array();
        foreach ($id_report_counts as $tanggal => $jumlah_laporan) {
            $result[] = array(
                'title' => 'Laporan: ' . $jumlah_laporan,
                'start' => $tanggal,
                'end' => $tanggal,
                'color' => ($jumlah_laporan > 0) ? 'blue' : 'red'
            );
        }

        return $result;
    }

    public function top_employee_absences(){
        $absences = Absence::all();
        // Initialize associative array to store counts
        $id_absence_counts = [];

        // Loop through the data
        foreach ($absences as $entry) {
            // Extract tanggal dari waktu
            $tanggal = date('Y-m', strtotime($entry['waktu']));

            // Cek apakah data berada di bulan Maret
            // get bulan dan tahun now
            $bulan = date('m');
            $tahun = date('Y');
            if ($tanggal == $tahun.'-'.$bulan && $entry['status_absen'] == 'Tepat Waktu') {
                // Increment count for id_absence
                $id_absence = $entry['id_absence'];
                if (isset($id_absence_counts[$id_absence])) {
                    $id_absence_counts[$id_absence]++;
                } else {
                    $id_absence_counts[$id_absence] = 1;
                }
            }
        }

        $new_id_absence_counts = [];
        // User::find($id_absence)->name;
        foreach ($id_absence_counts as $key => $value) {
            $new_id_absence_counts[User::find($key)->name] = $value;
        }

        // Sort the id_absence counts in descending order
        arsort($new_id_absence_counts);
        return $new_id_absence_counts;
    }

    public function top_employee_reports(){
        $reports = Report::all();
        // Initialize associative array to store counts
        $id_report_counts = [];

        // Loop through the data
        foreach ($reports as $entry) {
            // Extract tanggal dari waktu
            $tanggal = date('Y-m', strtotime($entry['waktu']));

            // Cek apakah data berada di bulan Maret
            // get bulan dan tahun now
            $bulan = date('m');
            $tahun = date('Y');
            if ($tanggal == $tahun.'-'.$bulan) {
                // Increment count for id_absence
                $id_absence = $entry['id_absence'];
                if (isset($id_report_counts[$id_absence])) {
                    $id_report_counts[$id_absence]++;
                } else {
                    $id_report_counts[$id_absence] = 1;
                }
            }
        }

        $new_id_report_counts = [];
        // User::find($id_absence)->name;
        foreach ($id_report_counts as $key => $value) {
            $new_id_report_counts[User::find($key)->name] = $value;
        }

        // Sort the id_absence counts in descending order
        arsort($new_id_report_counts);
        return $new_id_report_counts;
    }

    public function calender()
    {
        $this->deleteRedudant();
        $top_employee_absences = $this->top_employee_absences();
        $top_employee_reports = $this->top_employee_reports();
        $absences = $this->absence_calender();
        $absents = $this->absent_calender();
        $reports = $this->report_calender();
        $holidays = Holiday::all();
        $gmeets = Gmeet::all();
        return view('absence.calender', ['absences' => $absences, 'absents' => $absents, 'reports' => $reports, 'holidays' => $holidays ,'top_employee_absences' => $top_employee_absences, 'top_employee_reports' => $top_employee_reports, 'gmeets' => $gmeets]);
    }
    public function shift()
    {
        $this->deleteRedudant();
        $absences = $this->absence_shift();
        return view('absence.shift', ['absences' => $absences]);
    }

    public function listHoliday(){
        $holidays = Holiday::all();
        return view('absence.list-holiday', ['holidays' => $holidays]);
    }

    public function addHoliday(){
        return view('absence.add-holiday');
    }

    public function storeHoliday(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
        ]);
        $holiday = new Holiday();
        $holiday->title = $request->title;
        $holiday->date = $request->date;
        $holiday->save();
        return redirect('/list-holiday')->with('status', 'Holiday added successfully');
    }

    public function editHoliday($id){
        $holiday = Holiday::find($id);
        return view('absence.edit-holiday', ['holiday' => $holiday]);
    }

    public function updateHoliday(Request $request, $id){
        $holiday = Holiday::find($id);
        $holiday->title = $request->title;
        $holiday->date = $request->date;
        $holiday->save();
        return redirect('/list-holiday')->with('status', 'Holiday updated successfully');
    }

    public function deleteHoliday($id){
        $holiday = Holiday::find($id);
        $holiday->delete();
        return redirect()->back()->with('status', 'Holiday deleted successfully');
    }

}

