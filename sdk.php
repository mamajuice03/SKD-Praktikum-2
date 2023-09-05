<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Enkripsi & Dekripsi</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Program Enkripsi & Dekripsi</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="teks">Masukkan Teks:</label>
                <textarea class="form-control" name="teks" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="operasi">Pilih Operasi:</label>
                <select class="form-control" name="operasi">
                    <option value="enkripsi">Enkripsi</option>
                    <option value="dekripsi">Dekripsi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Proses</button>
        </form>

        <?php
        // Fungsi untuk mengenkripsi teks
        function enkripsi($teks, $tabelSubstitusi) {
            $teksTerenkripsi = strtr($teks, $tabelSubstitusi);
            return $teksTerenkripsi;
        }

        // Fungsi untuk mendekripsi teks
        function dekripsi($teksTerenkripsi, $tabelSubstitusi) {
            $teksAsli = strtr($teksTerenkripsi, array_flip($tabelSubstitusi));
            return $teksAsli;
        }

        // Tabel substitusi (tambahkan karakter dan perubahannya sesuai keinginan)
        $tabelSubstitusi = array(
            'a' => '1',
            'i' => '2',
            'u' => '3',
            'e' => '4',
            'o' => '5',
            // Tambahkan karakter dan perubahannya di sini
        );

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $teks = $_POST["teks"];
            $operasi = $_POST["operasi"];

            if ($operasi == "enkripsi") {
                $teksTerenkripsi = enkripsi($teks, $tabelSubstitusi);
                echo '<div class="mt-3"><strong>Hasil Enkripsi:</strong><br>' . $teksTerenkripsi . '</div>';
            } elseif ($operasi == "dekripsi") {
                $teksAsli = dekripsi($teks, $tabelSubstitusi);
                echo '<div class="mt-3"><strong>Hasil Dekripsi:</strong><br>' . $teksAsli . '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
