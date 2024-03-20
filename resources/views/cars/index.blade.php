<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil</title>
</head>
<body>
    <h2>Daftar Mobil Tersedia</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <ul>
        @foreach($cars as $car)
            <li>{{ $car->merek }} - {{ $car->model }} ({{ $car->nomor_plat }}) - Tarif: ${{ $car->tarif_sewa_per_hari }}/hari</li>
        @endforeach
    </ul>
</body>
</html>
