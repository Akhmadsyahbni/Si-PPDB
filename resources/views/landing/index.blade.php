@extends('layouts.landing')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up">
                <div>
                    <h1>SMP AL-IKHLAS Buntet Pesantren</h1>
                    <h2>Ayo Segara Daftarkan diri anda,Sebagai Peserta Didik Baru Gratiss!</h2>
                    <a href="{{ route('user.register') }}" class="download-btn"><i class=""></i>Daftar Sekarang</a>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img"
                data-aos="fade-up">
                <img src="assets/img/gambar3.png" class="img-fluid floating-image" alt="">
            </div>
        </div>
    </div>
</section><!-- End Hero -->

<!-- ======= Details Section ======= -->
<section id="details" class="details">
    <div class="container">

        <div class="row content">
            <div class="col-md-4" data-aos="fade-right">
                <img src="assets/img/details-1.png" class="img-fluid" alt="">
            </div>
            <div class="col-md-8 pt-4" data-aos="fade-up">
                <h3>Prosedur PPDB Via online.</h3>
                <p class="fst-italic">
                   Silahkan dilihat prosedur pendaftaran yang harus di lakukan calon siswa.
                </p>
                <ul>
                    <li><i class="bi bi-check"></i> Mengunjungi alamat webiste yang tertera </li>
                    <li><i class="bi bi-check"></i> Membuat akun terlebih dahulu sebelum login</li>
                    <li><i class="bi bi-check"></i> Setelah login maka akan diarahkan ke dashboard siswa.</li>
                    <li><i class="bi bi-check"></i> Calon Siswa harus mengisi formulir pendaftaran yang sudah di sediakan.</li>
                    <li><i class="bi bi-check"></i> Menungu hasil seleksi pendaftaran.</li>
                    <li><i class="bi bi-check"></i> mengakses menu calon siswa untuk melihat hasill seleksi pendaftaran.</li>
                </ul>
                {{-- <p>
                   jangan lupa membawa syarat pendaftara, seperti Fotocopy ijazah
                </p> --}}
            </div>
        </div>
    </div>
</section><!-- End Details Section -->

<section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">

            <h2>Calon Siswa yang mendaftar</h2>
            <p>Untuk melihat hasil seleksi pendaftaran silahkan kunjungi halaman ini, untuk melihat hasilnya apakah 
                lulus atau tidak, <br> untuk penggunaanya silahkan input no pendaftara masing-masing di kolom pencarian / Search.
            </p>
        </div>

        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 10px;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                text-align: center;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

        </style>
        <div class="card">
            <div class="card-body">
                <table id="myTable" class="table datatable table-striped table-hover table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Registrasi</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Status Pendaftaran</th>
                            <th scope="col">No Handphone</th>
                            <th scope="col">Asal Sekolah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $key => $siswas)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswas->no_registrasi }}</td>
                            <td>{{ $siswas->nama_lengkap }}</td>
                            {{-- <td><span class="badge bg-warning">{{ $siswas->status_pendaftaran }}</span></td> --}}
                            @if ($siswas->status_pendaftaran == 'pending')
                            <td><span class="badge bg-warning">{{ $siswas->status_pendaftaran }}</span></td>
                            @elseif ($siswas->status_pendaftaran == 'lulus')
                            <td><span class="badge bg-success">{{ $siswas->status_pendaftaran }}</span></td>
                            @elseif ($siswas->status_pendaftaran == 'ditolak')
                            <td><span class="badge bg-danger">{{ $siswas->status_pendaftaran }}</span></td>
                            @endif
                            <td>{{ $siswas->no_hp }}</td>
                            <td>{{ $siswas->sekolah->asal_sekolah }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section><!-- End Frequently Asked Questions Section -->

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container">
        <div class="section-title">

            <h2>Informasi Penerimaan Peserta Didik Baru</h2>
            <p>informasi ini berisi tentang batas waktu pendaftaran yang sudah di jadawalkan oleh panitia,jika waktu
                pendaftaran <br> sudah melibihi batas yang sudah di tentukan maka calon siswa atau wali siswa 
                tidak bisa melakukan pendaftaram
            </p>
        </div>

        <div class="card">
            @if ($countdown_seconds > 0)
            <div class="card-body ">
                <div style="font-size: 60px;
         font-weight: bold;
         text-align: center;" id="countdown"></div>
            </div>
            <p class="pendbuka">Pendaftaran Calon Peserta Didik Bru Masih Dibuka.</p>
            @else
            <!-- Tampilkan pesan jika waktu pendaftaran sudah berakhir -->
            <p>Mohon Maaf, Formulir Pendaftaran Sudah Ditutup.</p>
            {{-- <p>Dibuka pada Tanggal: {{ $ppdb->start_date->format('d-M-Y') }} s.d. {{ $ppdb->end_date->format('d-M-Y') }}
            </p> --}}
            @endif
        </div>
    </div>
</section><!-- End Pricing Section -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contact</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
                sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 info">
                        <i class="bx bx-map"></i>
                        <h4>Address</h4>
                        <p>A108 Adam Street,<br>New York, NY 535022</p>
                    </div>
                    <div class="col-lg-6 info">
                        <i class="bx bx-phone"></i>
                        <h4>Call Us</h4>
                        <p>+1 5589 55488 55<br>+1 5589 22548 64</p>
                    </div>
                    <div class="col-lg-6 info">
                        <i class="bx bx-envelope"></i>
                        <h4>Email Us</h4>
                        <p>contact@example.com<br>info@example.com</p>
                    </div>
                    <div class="col-lg-6 info">
                        <i class="bx bx-time-five"></i>
                        <h4>Working Hours</h4>
                        <p>Mon - Fri: 9AM to 5PM<br>Sunday: 9AM to 1PM</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form" data-aos="fade-up">
                    <div class="form-group">
                        <input placeholder="Your Name" type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group mt-3">
                        <input placeholder="Your Email" type="email" class="form-control" name="email" id="email"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <input placeholder="Subject" type="text" class="form-control" name="subject" id="subject"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea placeholder="Message" class="form-control" name="message" rows="5"
                            required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
<!-- Script section -->
<script>
    @if($countdown_seconds > 0)
    // Atur waktu akhir countdown (dalam detik)
    var countdownSeconds = {{$countdown_seconds}};
    var countdownElement = document.getElementById('countdown');

    function updateCountdown() {
        var days = Math.floor(countdownSeconds / (3600 * 24));
        var hours = Math.floor((countdownSeconds % (3600 * 24)) / 3600);
        var minutes = Math.floor((countdownSeconds % 3600) / 60);
        var seconds = countdownSeconds % 60;

        // Format waktu countdown menjadi "00 Hari 00:00:00"
        var formattedCountdown = (days < 10 ? '0' : '') + days + ' Hari ' +
            (hours < 10 ? '0' : '') + hours + ':' +
            (minutes < 10 ? '0' : '') + minutes + ':' +
            (seconds < 10 ? '0' : '') + seconds;

        countdownElement.textContent = formattedCountdown;

        countdownSeconds--;
        if (countdownSeconds >= 0) {
            setTimeout(updateCountdown, 1000);
        } else {
            countdownElement.textContent = 'PPDB sudah ditutup.';
        }
    }

    // Mulai countdown saat halaman dimuat
    updateCountdown();
    @endif
</script>


@endsection
