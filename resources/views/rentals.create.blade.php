<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Mobil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Peminjaman Mobil</h2>
        <form id="rentalForm" action="/rentals" method="POST">
            
            <label for="tanggal_mulai">Tanggal Mulai:</label><br>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" required><br>
            
            <label for="tanggal_selesai">Tanggal Selesai:</label><br>
            <input type="date" id="tanggal_selesai" name="tanggal_selesai" required><br>
            
            <label for="car_id">Mobil:</label><br>
            <select id="car_id" name="car_id" required>
                <option value="">Pilih Mobil</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->merek }} - {{ $car->model }} ({{ $car->nomor_plat }})</option>
                @endforeach
            </select><br>
            
            <input type="submit" value="Sewa Mobil">
        </form>
    </div>

    <script>
        function validateForm() {
            var tanggalMulai = document.getElementById("tanggal_mulai").value;
            var tanggalSelesai = document.getElementById("tanggal_selesai").value;
            var carId = document.getElementById("car_id").value;

            if (tanggalMulai == "" || tanggalSelesai == "" || carId == "") {
                alert("Mohon lengkapi semua kolom.");
                return false;
            }
            return true;
        }

        document.getElementById("rentalForm").addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault(); 
            }
        });
    </script>
</body>
</html>
