<?php
include "koneksi.php";

$id = "";
$nama = "";
$email = "";
$telepon = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location: crud/index.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "select * from pendatang where id=$id";
    $result = $kon->query($sql);
    $row = $result->fetch_assoc();
    while (!$row) {
        header("location: crud/index.php");
        exit;
    }
    $nama = $row["nama"];
    $email = $row["email"];
    $telepon = $row["telepon"];
} else {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $telepon = $_POST["telepon"];

    $sql = "update pendatang set nama='$nama', email='$email', telepon='$telepon' where id='$id'";
    $result = $kon->query($sql);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Tambah Pendatang</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Tambah Baru</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-lg-6 m-auto">

        <form method="post">

            <br><br>
            <div class="card">

                <div class="card-header bg-warning">
                    <h1 class="text-white text-center"> Update Pendatang </h1>
                </div><br>

                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

                <label> Nama: </label>
                <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control"> <br>

                <label> Email: </label>
                <input type="text" name="email" value="<?php echo $email; ?>" class="form-control"> <br>

                <label> Telepon: </label>
                <input type="text" name="telepon" value="<?php echo $telepon; ?>" class="form-control"> <br>

                <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

            </div>
        </form>
    </div>
</body>

</html>