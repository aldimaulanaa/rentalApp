<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Registrasi Pengguna</h2>
        <form id="registrationForm" action="/register" method="POST">
            
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" required><br>
            
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat" required><br>
            
            <label for="nomor_telepon">Nomor Telepon:</label><br>
            <input type="text" id="nomor_telepon" name="nomor_telepon" required><br>
            
            <label for="nomor_SIM">Nomor SIM:</label><br>
            <input type="text" id="nomor_SIM" name="nomor_SIM" required><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            
            <input type="submit" value="Register">
        </form>
    </div>

    <script>
        function validateForm() {
            var nama = document.getElementById("nama").value;
            var alamat = document.getElementById("alamat").value;
            var nomorTelepon = document.getElementById("nomor_telepon").value;
            var nomorSIM = document.getElementById("nomor_SIM").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (nama == "" || alamat == "" || nomorTelepon == "" || nomorSIM == "" || email == "" || password == "") {
                alert("Mohon lengkapi semua kolom.");
                return false;
            }
            return true;
        }

        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault(); 
            }
        });
    </script>
</body>
</html>
