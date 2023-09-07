// document.addEventListener('DOMContentLoaded', function() {
//     // Ambil waktu mulai dan akhir dari variabel PHP atau dapatkan melalui AJAX
//     var startDate = moment('{{ $ppdb->start_date }}');
//     var endDate = moment('{{ $ppdb->end_date }}');

//     // Perbarui waktu berjalan setiap detik
//     setInterval(function() {
//         var now = moment();
//         var remainingTime = moment.duration(endDate.diff(now));

//         // Tampilkan waktu berjalan dalam format yang diinginkan
//         var countdownElement = document.getElementById('countdown');
//         countdownElement.innerHTML = remainingTime.format('D [hari] H [jam] m [menit] s [detik]');
//     }, 1000);
// });
