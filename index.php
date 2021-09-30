<?php

    $koneksi = mysqli_connect("localhost", "root", "", "aerator");
    if (!$koneksi){
        echo "Koneksi Gagal";
        die;
    }

    $result = mysqli_query($koneksi, "SELECT * FROM tb_status WHERE id=1");

    $akt = mysqli_fetch_assoc($result)['status'];

    if ($akt == 0){
        $aktif = "nonaktif";    
    } else {
        $aktif = "aktif";
    }
    
    if(isset($_GET['set'])){
        if($_GET['set']=="nonaktif"){
            mysqli_query($koneksi, "UPDATE tb_status SET status='1' WHERE id='1'");
        }else{
            mysqli_query($koneksi, "UPDATE tb_status SET status='0' WHERE id='1'");
        }
    }



?>

<!doctype html>
<html lang="en">
  <head>
    <style>
        .bg-primary{
            color: white;
        }

        .bg-danger {
            color: white;
        }
        .bg-danger a {
            color: white;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>STATUS AERATOR</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card <?php
                    if ($aktif == "aktif"){
                        echo "bg-primary";
                    } else if ($aktif == "nonaktif"){
                        echo "bg-danger";
                    }
                
                ?>" style="">
                    <div class="card-body text-center">
                        <h5 class="card-title">STATUS: <?= $aktif ?></h5>
                        <hr color="white">
                        <p class="card-text">PHP2D - PBK - UNIKU</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <?php
                    if ($aktif == "aktif"){
                        echo '<a href="index.php?set=aktif" style="color:white;" class="btn btn-lg btn-danger btn-lg">NONAKTIF</a>';
                    } else if ($aktif == "nonaktif"){
                        echo '<a href="index.php?set=nonaktif" style="color:white;" class="btn btn-lg btn-primary btn-lg">AKTIF</a>';
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>