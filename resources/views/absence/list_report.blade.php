@extends('template-wpadmin')

@section('navbar_menu_absence', 'active')

@section('main')
<div class="container my-5">

    <h1 class="my-5 text-center">Daftar Laporan Harian Admin</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <select class="form-select" name="day" id="day">
        @for($i = 1; $i <= 31; $i++)
            @php
                $i_day = $i < 10 ? '0' . $i : $i;
            @endphp
            <option value="{{$i_day}}" @if($day == $i_day) selected @endif>{{$i_day}}</option>
        @endfor        
    </select>

    <select class="form-select" name="month" id="month">
        <?php
            $list_month = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember'
            );
        ?>
        @foreach($list_month as $key => $value)
            <option value="{{$key}}" @if($month == $key) selected @endif>{{$value}}</option>
        @endforeach
    </select>
    <select class="form-select" name="year" id="year">
        @for($i = 2021; $i <= 2030; $i++)
            <option value="{{$i}}" @if($year == $i) selected @endif>{{$i}}</option>
        @endfor
    </select>

    <select class="form-select" name="jenis_absen" id="jenis_absen">
        <option value="all" @if($jenis_absen == 'all') selected @endif>Semua</option>
    </select>

    <button type="button" class="btn btn-primary" id="searchData">Ubah</button>
    <div class="d-flex justify-content-between my-3">
        <a href="#" type="button" class="btn btn-danger" id="prevDay">Before</a>
        <a href="#" type="button" class="btn btn-success" id="nextDay">Next</a>
    </div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama User</th>
            <th>Waktu</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reports as $index => $report)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $report['nama_user'] }}</td>
            <td>{{ $report['waktu'] }}</td>
            <td>
                {!! $report['description'] !!}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
        <script type="text/javascript">
            function getDaysInMonth(month, year) {
                return new Date(year, month, 0).getDate();
            }

            document.getElementById('searchData').onclick = function () {
                var day = document.getElementById('day').value;
                var month = document.getElementById('month').value;
                var year = document.getElementById('year').value;
                var jenis_absen = document.getElementById('jenis_absen').value;
                window.location.href = "/absence/report/list/" + day + "/" + month + "/" + year + "/" + jenis_absen;
            };

            document.getElementById('prevDay').onclick = function () {
                var day = parseInt(document.getElementById('day').value);
                var month = document.getElementById('month').value;
                var year = document.getElementById('year').value;

                if (day > 1) {
                    day -= 1;
                } else {
                    var prevMonth = month - 1;
                    if (prevMonth < 1) {
                        prevMonth = 12;
                        year -= 1;
                    }
                    day = getDaysInMonth(prevMonth, year);
                    month = prevMonth < 10 ? '0' + prevMonth : prevMonth;
                }
                window.location.href = "/absence/report/list/" + day + "/" + month + "/" + year + "/all";
            };

            document.getElementById('nextDay').onclick = function () {
                var day = parseInt(document.getElementById('day').value);
                var month = document.getElementById('month').value;
                var year = document.getElementById('year').value;
                var daysInMonth = getDaysInMonth(month, year);

                if (day < daysInMonth) {
                    day += 1;
                } else {
                    var nextMonth = parseInt(month) + 1;
                    if (nextMonth > 12) {
                        nextMonth = 1;
                        year = parseInt(year) + 1;
                    }
                    day = 1;
                    month = nextMonth < 10 ? '0' + nextMonth : nextMonth;
                }
                window.location.href = "/absence/report/list/" + day + "/" + month + "/" + year + "/all";
            };
        </script>

</div>
@endsection
