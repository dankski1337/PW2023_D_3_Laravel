@extends('User.dashboard.user-dashboard')

@section('content')

    <head>
        <title>JogjaCar - Detail Transaksi</title>
    </head>

    <style>
        .container-details {
            /* align-items: center;
                            justify-content: center; */
        }

        .btn-confirm .btn-cancel {
            width: 40px !important;
        }

        .btn-confirm {
            text-align: center;
            background-color: #003EB7;
            color: white;
        }
    </style>

    <div class="container-details">
        <h1 class="text-center fw-bold my-4">Detail Transaksi</h1>
        @if (session('success'))
            <div class="alert alert-success my-4" id="alerts">
                <b>Yeay!</b> {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('transaksi.riwayat') }}" class="mx-4">
            <i class="fa fa-arrow-left"></i>
            Kembali ke Riwayat Transaksi
        </a>
        <div class="card mx-4 py-4 px-4 mt-4">
            <table class="table table-borderless">
                <tr>
                    <td class="text-start">ID</td>
                    <td class="text-end">{{ $transaksi['id_rental_transaksi'] }}</td>
                </tr>
                <tr>
                    <td class="text-start">Lokasi Pengambilan</td>
                    <td class="text-end">{{ $transaksi['lokasi_pengambilan'] }}</td>
                </tr>
                <tr>
                    <td class="text-start">Tanggal Pengambilan</td>
                    {{-- <td class="text-end">{{$transaksi['tanggal_pengambilan']}}</td> --}}
                    <td class="text-end" id="tanggal_pengambilan">{{ $transaksi['tanggal_pengambilan'] }}</td>
                </tr>
                <tr>
                    <td class="text-start">Jam Pengambilan</td>
                    <td class="text-end" id="jam_pengambilan">{{ $transaksi['jam_pengambilan'] }}</td>
                </tr>
                <tr>
                    <td class="text-start">Tanggal Pengembalian</td>
                    <td class="text-end" id="tanggal_pengembalian">{{ $transaksi['tanggal_pengembalian'] }}</td>
                </tr>
                <tr>
                    <td class="text-start">Jam Pengembalian</td>
                    <td class="text-end" id="jam_pengembalian">{{ $transaksi['jam_pengembalian'] }}</td>
                </tr>
                <tr>
                    <td class="text-start">Mobil</td>
                    <td class="text-end">{{ $transaksi->mobil->model }} {{ $transaksi->mobil->tahun_produksi }} -
                        {{ $transaksi->mobil->warna }}</td>
                </tr>
                @if ($transaksi['denda'] != 0)
                    <tr>
                        <td class="text-start">Denda</td>
                        <td class="text-end">Rp{{ $transaksi['denda'] }}</td>
                    </tr>
                @endif
                <tr>
                    <td class="text-start">Status</td>
                    <td class="text-end">
                        @if ($transaksi['status'] == 'Sudah Dibayar')
                            <p class="text-success fw-semibold">{{ $transaksi['status'] }}</p>
                        @else
                            <p class="text-danger fw-semibold">{{ $transaksi['status'] }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Total</td>
                    <td class="text-end fw-bold">Rp{{ $transaksi['total_harga'] }}</td>
                </tr>
            </table>
            @if ($transaksi['status'] == 'Belum Dibayar')
                <div class="col">
                    <p class="mb-0">
                        <strong>Bayar sebelum : </strong>
                        <strong id="deadline_pembayaran">{{ $transaksi['deadline_pembayaran'] }}</strong>
                    </p>
                    <p style="font-size: 14px;"><em>Pembayaran terlambat dapat dikenakan denda</em></p>
                </div>
            @endif
        </div>
    </div>

    <script>
        setTimeout(function() {
            var alert = document.getElementById('alerts');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = 0;

                setTimeout(function() {
                    alert.remove();
                }, 500);
            }
        }, 3500);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tanggalAmbilElement = document.getElementById('tanggal_pengambilan');
            var tanggalKembaliElement = document.getElementById('tanggal_pengembalian');
            var tanggalDeadlineElemetn = document.getElementById('deadline_pembayaran');

            var originalAmbilDate = tanggalAmbilElement.textContent.trim();
            var originalKembaliDate = tanggalKembaliElement.textContent.trim();
            var originalDeadline = tanggalDeadlineElemetn.textContent.trim();

            // Create a Date object from the original date string
            var dateAmbilObject = new Date(originalAmbilDate);
            var dateKembaliObject = new Date(originalKembaliDate);
            var deadlineObject = new Date(originalDeadline);

            var formattedAmbilDate = formatDate(dateAmbilObject);
            var formattedKembaliDate = formatDate(dateKembaliObject);
            var formattedDeadline = formatDate(deadlineObject);

            tanggalAmbilElement.textContent = formattedAmbilDate;
            tanggalKembaliElement.textContent = formattedKembaliDate;
            tanggalDeadlineElemetn.textContent = formattedDeadline;
        });

        function formatDate(date) {
            // Months for formatting
            var months = [
                "Jan", "Feb", "Mar",
                "Apr", "May", "Jun",
                "Jul", "Aug", "Sep",
                "Oct", "Nov", "Dec"
            ];

            // Get day, month, and year
            var day = date.getDate();
            var monthIndex = date.getMonth();
            var year = date.getFullYear();

            // Format the date
            var formattedDate = day + ' ' + months[monthIndex] + ' ' + year;

            return formattedDate;
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var jamElement = document.getElementById('jam_pengambilan');
            var jamKembaliElement = document.getElementById('jam_pengembalian')

            var originalTime = jamElement.textContent.trim();
            var originalKembaliTime = jamKembaliElement.textContent.trim();

            // Format the time as "hh:mm"
            var formattedTime = formatTime(originalTime);
            var formattedKembali = formatTime(originalKembaliTime);

            jamElement.textContent = formattedTime;
            jamKembaliElement.textContent = formattedKembali;
        });

        function formatTime(time) {
            // Split the time string into hours, minutes, and seconds
            var timeComponents = time.split(':');
            var hours = timeComponents[0];
            var minutes = timeComponents[1];

            // Format the time as "hh:mm"
            var formattedTime = hours + ':' + minutes;

            return formattedTime;
        }
    </script>
@endsection
