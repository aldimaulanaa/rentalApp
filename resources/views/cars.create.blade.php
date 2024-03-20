<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil Baru</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Mobil Baru</h2>
        <form id="carForm" action="/cars" method="POST">
            <label for="merek">Merek:</label><br>
            <input type="text" id="merek" name="merek" required><br>
            
            <label for="model">Model:</label><br>
            <input type="text" id="model" name="model" required><br>
            
            <label for="nomor_plat">Nomor Plat:</label><br>
            <input type="text" id="nomor_plat" name="nomor_plat" required><br>
            
            <label for="tarif_sewa_per_hari">Tarif Sewa per Hari:</label><br>
            <input type="number" id="tarif_sewa_per_hari" name="tarif_sewa_per_hari" required><br>
            
            <input type="submit" value="Tambahkan Mobil">
        </form>
    </div>

    <script>
        function validateForm() {
            var merek = document.getElementById("merek").value;
            var model = document.getElementById("model").value;
            var nomorPlat = document.getElementById("nomor_plat").value;
            var tarifSewaPerHari = document.getElementById("tarif_sewa_per_hari").value;

            if (merek == "" || model == "" || nomorPlat == "" || tarifSewaPerHari == "") {
                alert("Mohon lengkapi semua kolom.");
                return false;
            }
            return true;
        }

        document.getElementById("carForm").addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault(); 
            }
        });
    </script>
</body>
</html>
