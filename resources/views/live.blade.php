<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">
  <title>Live</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="{{ asset('assets/css/offcanvas.css') }}" rel="stylesheet">
</head>

<body class="bg-light">
  <main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-baznas rounded box-shadow">
      <img class="mr-3" src="{{ asset('assets/images/_logo.png') }}" alt="" width="48" height="48">
      <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">BAZNAS KABUPATEN TULANG BAWANG</h6>
      </div>
      <div id="clock" class="ml-auto text-white h5 mt-2 font-weight-bold">
        <h6>Loading...</h6>
    </div>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
      <h6 class="border-bottom border-gray pb-2 mb-0">PSESERTA TES CAT</h6>
      <table class="table  table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NO UJIAN</th>
            <th scope="col">NAMA</th>
            <th scope="col">STATUS</th>
            <th scope="col">NILAI</th>
          </tr>
        </thead>
        <tbody id="tbody">
          
        </tbody>
      </table>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(() => {
        loadLive();
        setInterval(() => {
            tampilkanWaktu();
        }, 1000);

        function tampilkanWaktu() {
        var waktu = new Date();    
        var sh = waktu.getHours() + "";   
        var sm = waktu.getMinutes() + "";  
        var ss = waktu.getSeconds() + ""; 
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
        }
    });

    function loadLive()
    {
        console.log('ok');
        $.ajax({
            'url': '{{ url()->current() }}',
            'type': 'GET',
    
            success(res) {
                $('#tbody').html(res);
            },
            error(res) {
                console.log(res)
            }
        });
    }

    setInterval(() => {
        loadLive();
    }, 5000);
</script>
</body>

</html>