<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receh.in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
<div class="container text-center">
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <p class="fs-1 fw-bold font-monospace">JOKES RECEH</p>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <p class="fs-2 fw-light" id="jokes">Jokes random bakal tampil disini, Klik tombol Refresh dibawah boy...</p>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Klik supaya jokes nya ke update boy" id="btnJokes"><i class="bi bi-arrow-clockwise"></i> Jokes</button>
        </div>
    </div>
</div>
</body>
<footer class="mt-auto text-center">
  <p>Jokes base from api : <a href="https://github.com/ardhptr21/candaan-api" target="_blank">Candaan Api</a></p>
</footer>
<script>
    let btnJokes = $("#btnJokes");
    btnJokes.on('click', function(event) {
        event.preventDefault();

        $.ajax({
            url: "https://candaan-api.vercel.app/api/text/random",
            dataType: "JSON",
            type: "GET",
            beforeSend : function(e){
                btnJokes.html('Tunggu Bentar ...');
                btnJokes.attr("disabled", true);
            },
            success : function(data, status){
                let jokes = data.data;
                $('#jokes').text('"'+jokes+'"');
            },
            error: function(e,r,d){
                console.error(e);
            },
            complete: function(e){
                btnJokes.html('<i class="bi bi-arrow-clockwise"></i> Jokes');
                btnJokes.attr("disabled", false);
            }
        });
    });
</script>
</html>