<!DOCTYPE html>
<html>
<head>
    <title>Program Enkripsi & Dekripsi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Program Enkripsi & Dekripsi</h2>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#enkripsi">Enkripsi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dekripsi">Dekripsi</a>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <!-- Tab Enkripsi -->
            <div id="enkripsi" class="tab-pane active">
                <form action="contoh.php" method="post">
                    <div class="form-group">
                        <label for="text">Teks yang akan dienkripsi:</label>
                        <input type="text" class="form-control" id="text" name="text_enkripsi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enkripsi</button>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["text_enkripsi"])) {
                    $inputText = $_POST["text_enkripsi"];
                    $encryptedText = encryptText($inputText);
                    echo "<div class='container mt-3'><h4>Hasil Enkripsi:</h4><p>$encryptedText</p></div>";
                }

                function encryptText($text) {
                    $charMap = [
                        'a' => '~', 'i' => '$', 'u' => '^', 'e' => '#', 'o' => '+',
                        'A' => '!', 'I' => '%', 'U' => '_', 'E' => '=', 'O' => '*',
                        '1' => '<', '2' => '>', '3' => '(', '4' => ')', '5' => '-',
                        '6' => '@', '7' => '.', '8' => '[', '9' => ']', '0' => '`' 
                        // Tambahkan aturan penggantian karakter lain di sini
                    ];

                    $encryptedText = strtr($text, $charMap);
                    return $encryptedText;
                }
                ?>
            </div>

            <!-- Tab Dekripsi -->
            <div id="dekripsi" class="tab-pane">
                <form action="contoh.php" method="post">
                    <div class="form-group">
                        <label for="ciphertext">Ciphertext:</label>
                        <input type="text" class="form-control" id="ciphertext" name="text_dekripsi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Dekripsi</button>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["text_dekripsi"])) {
                    $ciphertext = $_POST["text_dekripsi"];
                    $decryptedText = decryptText($ciphertext);
                    echo "<div class='container mt-3'><h4>Hasil Dekripsi:</h4><p>$decryptedText</p></div>";
                }

                function decryptText($ciphertext) {
                    $charMap = [
                        '~' => 'a', '$' => 'i', '^' => 'u', '#' => 'e', '+' => 'o',
                        '!' => 'A', '%' => 'I', '_' => 'U', '=' => 'E', '*' => 'O',
                        '<' => '1', '>' => '2', '(' => '3', ')' => '4', '-' => '5',
                        '@' => '6', '.' => '7', '[' => '8', ']' => '9', '`' => '0'
                        // Tambahkan aturan penggantian karakter lain di sini
                    ];

                    $decryptedText = strtr($ciphertext, $charMap);
                    return $decryptedText;
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
