<!DOCTYPE html>
<html>
<head>
  <title>Midtrans Payment</title>
  <style>
    /* Gaya untuk loading */
    .loading-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .loading {
      font-size: 24px;
      color: #333;
    }

    /* Gaya untuk hasil atau error setelah pembayaran */
    #result-json {
      margin-top: 20px;
      font-size: 18px;
      color: #333;
    }
  </style>
</head>
<body>
  <!-- Elemen loading besar -->
  <div class="loading-container">
    <div class="loading">Loading...</div>
  </div>

  <!-- Skrip Midtrans -->
  <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client--21_FPKQFN6BmJjf"></script>
  <script type="text/javascript">
    var midtransResponse = {!! json_encode($token) !!};

    // Memanggil snap.pay setelah halaman dimuat
    window.onload = function() {
      snap.pay(midtransResponse, {
        // onSuccess, onPending, onError...
        onSuccess: function(result){
          // Beri tahu pengguna bahwa pembayaran berhasil dilakukan
          // document.querySelector('#result-json').innerHTML += JSON.stringify(result, null, 2);
          var id="{{$idtransaction}}";
          var id = id.split("kode");
          var id = id[1];
          window.location.href = "/midtranssukses/"+id;
        },
        onPending: function(result){
          // Beri tahu pengguna bahwa pembayaran sedang diproses
          // document.querySelector('#result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        onError: function(result){
          // Beri tahu pengguna bahwa terjadi error pada pembayaran
          // document.querySelector('#result-json').innerHTML += JSON.stringify(result, null, 2);
        }
      });

      // Mengganti tampilan elemen loading setelah skrip Midtrans berjalan
      document.querySelector('.loading-container').style.display = 'none';
    };
  </script>
</body>
</html>
