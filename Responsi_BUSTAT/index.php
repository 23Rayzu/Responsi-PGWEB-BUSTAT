<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Terminal di Provinsi Lampung</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* General reset and body styles */
        body,
        h1,
        h2,
        h4 {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            line-height: 1.6;
            color: #333;
        }

        h1 {
            color: #4a90e2;
            font-weight: bold;
        }

        h4 {
            background-color: #4a90e2;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
        }

        p {
            text-indent: 35px;
            text-align: justify;
        }

        a {
            color: #4a90e2;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        /* Button styling */
        button {
            background-color: #4a90e2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #357ab7;
        }

        .container-fluid {
            padding: 15px;
        }

        /* Main container */
        main {
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
        }

        /* Navbar adjustments */
        .navbar {
            background-color: #2c3e50;
            padding: 10px 20px;
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #ecf0f1 !important;
            margin-right: 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #3498db !important;
        }

        /* Section spacing */
        section {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BUSTAT LAMPUNG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="beranda.html">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="map.html">Peta</a></li>
                    <li class="nav-item"><a class="nav-link" href="tabel.html">Tabel Informasi</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Data Terminal di Provinsi Lampung</h1>
        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Terminal</th>
                    <th>Latitude</th <th>Longitude</th>
                    <th>Alamat</th>
                    <th>Kabupaten</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $servername = "localhost"; // Ganti dengan server Anda
                $username = "root"; // Ganti dengan username Anda
                $password = ""; // Ganti dengan password Anda
                $dbname = "nama_database"; // Ganti dengan nama database Anda

                // Membuat koneksi
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Memeriksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Mengambil data dari tabel
                $sql = "SELECT * FROM terminal_lampung";
                $result = $conn->query($sql);

                // Menampilkan data dalam tabel
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["nama_terminal"]) . "</td>
                                <td>" . htmlspecialchars($row["latitude"]) . "</td>
                                <td>" . htmlspecialchars($row["longitude"]) . "</td>
                                <td>" . htmlspecialchars($row["alamat"]) . "</td>
                                <td>" . htmlspecialchars($row["kabupaten"]) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                }

                // Menutup koneksi
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>