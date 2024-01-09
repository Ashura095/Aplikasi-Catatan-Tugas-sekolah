<?php
$tugas_sekolah = [];

function tambahTugas($deskripsi, $deadline) {
    global $tugas_sekolah;
    $tugas_sekolah[] = ['deskripsi' => $deskripsi, 'deadline' => $deadline];
}

function hapusTugas($index) {
    global $tugas_sekolah;
    if (isset($tugas_sekolah[$index])) {
        unset($tugas_sekolah[$index]);
    }
}

function tampilkanDaftarTugas($tugas_sekolah) {
    echo "<h2>Daftar Tugas:</h2>";
    echo "<ul>";
    foreach ($tugas_sekolah as $index => $tugas) {
        echo "<li>{$tugas['deskripsi']} - Deadline: {$tugas['deadline']} ";
        echo "<a href='?hapus=$index' class = 'hapus'>Hapus</a></li>";
    }
    echo "</ul>";
}

// Menangani aksi pengguna
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['deskripsi']) && !empty($_POST['deadline'])) {
        $deskripsi = $_POST['deskripsi'];
        $deadline = $_POST['deadline'];

        tambahTugas($deskripsi, $deadline);
    }
}

if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    hapusTugas($index);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Tugas Sekolah</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Londrina+Shadow&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
            background-image: url(Lovepik_com-500408949-book.jpg);
            background-repeat: no-repeat; 
            background-size: 100% 150%;
        }

        h1{
            font-family: 'Londrina Shadow', sans-serif;
            font-size: 50px;
        }
        h1, h2 {
            color:white;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: black;
            font-weight: bold;
        }

        input {
            padding: 5px;
            margin-bottom: 10px;
        }

        button {
            padding: 8px;
            background-color: grey;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: black;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        a {
            color: wheat;
            text-decoration: none;
            margin-left: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .pemberitahuan {
            color: red;
        }
        .bungkus{
            background-color: rgb(red, green, blue);
        }
        .hapus{
          color: black;
          font-weight: bold;

        }
    </style>
</head>
<body>
    <h1><span>☆</span>~ Catatan Tugas Sekolah ~<span>☆</span></h1>
    <hr>
<div class="bungkus"></div>
    <!-- Form untuk menambahkan tugas -->
    <h2>Tambah Tugas Baru</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="deskripsi">Deskripsi Tugas:</label>
        <input type="text" name="deskripsi" required>
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" required>
        <button type="submit">Tambah Tugas</button>
    </form>

    <?php
    // Menampilkan daftar tugas
    tampilkanDaftarTugas($tugas_sekolah);
    ?>
    </div>
</body>
</html>
