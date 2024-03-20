<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Mobil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Pengembalian Mobil</h2>
        <form id="returnForm" action="/returns" method="POST">
            
            <label for="nomor_plat">Nomor Plat Mobil:</label><br>
            <input type="text" id="nomor_plat" name="nomor_plat" required><br>
            
            <input type="submit" value="Kembalikan Mobil">
        </form>
    </div>

    <script>
        function validateForm() {
            var nomorPlat = document.getElementById("nomor_plat").value;

            if (nomorPlat == "") {
                alert("Mohon masukkan nomor plat mobil.");
                return false;
            }
            return true;
        }

        document.getElementById("returnForm").addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
