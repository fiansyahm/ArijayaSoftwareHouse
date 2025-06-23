@extends('template-wpadmin')

@section('navbar_menu_absence', 'active')

@section('main')
<div class="container mt-5">
    <h1>Live Rank</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Nama</th>
                <th onclick="showKomisi()">Income</th>
                <th id="komisi" style="display: none">Komisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranks as $name => $income)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $name }}</td>
                    <td>Rp.{{ number_format($income, 0, ',', '.') }}</td>
                    <td class="income" style="display: none">Rp.{{ number_format($income / 10, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function showKomisi() {
            document.getElementById("komisi").style.display = "block";
            // show class income
            var income = document.getElementsByClassName("income");
            for (var i = 0; i < income.length; i++) {
                income[i].style.display = "block";
            }
        }
    </script>
</div>
@endsection
