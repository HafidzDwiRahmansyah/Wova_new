@extends('layouts.layout')

@section('title', 'Beranda')

@section('content')
<section class="content">
    <div class="container">
        <div class="jarak1"></div>
        <div class="row justify-content-arround">
            <div class="col-lg-5">
                <h3 class="text-white text-mobile-center-heading">WOVA GROUP</h3>
                <p class="text-white text-justify">Wova CV adalah jasa pembuatan dokumen kerja yang di
                    kembangkan
                    dan di analisa No.1 di Indonesia. Kami menyediakan 3 tipe CV, 3 format,
                    dan berbagai template yang sesuai dengan kebutuhanmu. Sudah lebih dari
                    15 ribu orang dari 35+ profesi yang mempercayakan dokumen mereka
                    kepada kami. Kini giliranmu!</p>
                <a class="btn btn-primary-2 px-4 py-2 rounded-2 btn-responsive" href="#katalog">Pesan Sekarang</a>
            </div>
        </div>
    </div>
</section>

<section class="katalog my-5" id="katalog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <h3 class="my-5 text-center">Katalog Produk</h3>
                <div class="row gy-4 justify-content-center">
                    @foreach ($katalog as $item)
                    <div class=" col-lg-3 col-sm-6 col-6">
                        <div class="card border-0 shadow rounded-4">
                            <img class="img-fluid rounded-4" src="/storage/{{ $item->image }}" alt="" width="100%"
                                height="auto">
                            <div class="card-body">
                                <p><b>{{ $item->title }}</b></p>
                                <p>{{ $item->deskripsi }}</p>
                                <p><i><s>Rp. {{ number_format($item->price, 0, ',', '.') }}</s></i></p>
                                <h3 class="text-danger"><b>Rp. {{ number_format($item->price - 10000, 0, ',', '.')
                                        }}</b></h3>
                                <hr>
                                <button class="btn btn-primary mx-auto d-block" type="button" data-bs-toggle="modal"
                                    data-bs-target="#mainModal{{ $item->kode }}">
                                    Pesan Sekarang
                                </button>

                                <div class="modal fade" id="mainModal{{ $item->kode }}" tabindex="-1"
                                    aria-labelledby="mainModalLabel{{ $item->kode }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mainModalLabel{{ $item->kode }}">Main Menu
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#uploadCvModal{{ $item->kode }}"
                                                    data-bs-dismiss="modal">
                                                    Upload CV Lama
                                                </button> -->
                                                <a href="/form/{{ $item->kode }}" class="btn btn-secondary">
                                                    Isi Form
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="uploadCvModal{{ $item->kode }}" tabindex="-1"
                                    aria-labelledby="uploadCvModalLabel{{ $item->kode }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadCvModalLabel{{ $item->kode }}">Upload
                                                    CV Lama</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/uploadPdf" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <label class="form-label" for="pdf-upload">Upload CV lama</label>
                                                    <input class="form-control" type="file" name="pdf-upload"
                                                        id="pdfUpload{{ $item->kode }}" accept="application/pdf"
                                                        placeholder="maksimal 2MB" required>
                                                    <p>Total Lembar : <span class="pageCount" id="page-count{{ $item->kode }}"></span></p>
                                                    <input type="number" name="kode" id="kode" value="{{ $item->kode }}"
                                                        hidden required>
                                                    <label class="form-label" for="note">Tambahkan Note</label>
                                                    <textarea class="form-control" name="note"
                                                        id="limitedTextarea{{ $item->kode }}" cols="30"
                                                        rows="5" required></textarea>
                                                    <p class="word-count-info">
                                                        Kata yang sudah diketik: <span
                                                            id="wordCount{{ $item->kode }}">0</span> / 300
                                                    </p>
                                                    <button class="btn btn-primary mx-auto d-block my-3" type="submit">
                                                        <i class="bi bi-send-fill me-2"></i>Send
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimoni my-5" id="testimoni">
    <div class="container-fluid">
        <h3 class="text-center mt-5">Testimoni</h3>
        <p class="text-center mb-5">Testimoni dari beberapa pelanggan kami</p>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="swiper Testimoni">
                    <div class="swiper-wrapper gallery">
                        <div class="swiper-slide">
                            <a href="/image/testimoni/1.png">
                                <img class="img-fluid rounded-3" src="/image/testimoni/1.png" alt="testimoni"
                                    width="100%" height="auto">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/image/testimoni/2.png">
                                <img class="img-fluid rounded-3" src="/image/testimoni/2.png" alt="testimoni"
                                    width="100%" height="auto">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/image/testimoni/3.png">
                                <img class="img-fluid rounded-3" src="/image/testimoni/3.png" alt="testimoni"
                                    width="100%" height="auto">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/image/testimoni/4.png">
                                <img class="img-fluid rounded-3" src="/image/testimoni/4.png" alt="testimoni"
                                    width="100%" height="auto">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/image/testimoni/5.png">
                                <img class="img-fluid rounded-3" src="/image/testimoni/5.png" alt="testimoni"
                                    width="100%" height="auto">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/image/testimoni/6.png">
                                <img class="img-fluid rounded-3" src="/image/testimoni/6.png" alt="testimoni"
                                    width="100%" height="auto">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/image/testimoni/7.png">
                                <img class="img-fluid rounded-3" src="/image/testimoni/7.png" alt="testimoni"
                                    width="100%" height="auto">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/image/testimoni/8.png">
                                <img class="img-fluid rounded-3" src="/image/testimoni/8.png" alt="testimoni"
                                    width="100%" height="auto">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/image/testimoni/9.png">
                                <img class="img-fluid rounded-3" src="/image/testimoni/9.png" alt="testimoni"
                                    width="100%" height="auto">
                            </a>
                        </div>
                    </div>
                    <div class="jarak"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5 artikel" id="artikel">
    <h3 class="text-center my-5">Artikel</h3>
    <div class="cotainer">
        <div class="row g-0 justify-content-center">
            <div class="col-lg-8">
                <div class="swiper Artikel my-3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card border-0 shadow rounded-2">
                                <div class="card-img-wrapper">
                                    <img class="img-fluid rounded-top-2 card-img" src="/img/Picture1.jpg" alt="testimoni2" width="100%"
                                        height="auto">
                                </div>
                                <div class="card-body">
                                    <p class="text-secondary">20 Oktober 2024</p>
                                    <h5 style="font-size: 16px;">Hati-Hati! Ini Dia Ciri-Ciri Loker Penipuan yang Wajib Dihindari!
                                    </h5>
                                    <p class="text-justify" style="font-size: 14px;">
                                        Siapa sih yang gak senang dapat info loker atau lowongan kerja? Tapi, jangan buru-buru seneng dulu!
                                        Banyak loh, loker penipuan yang memanfaatkan orang-orang yang lagi cari kerja.
                                        <a class="btn btn-primary mx-auto d-block rounded-2" href="contoh">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow rounded-2">
                                <div class="card-img-wrapper">
                                    <img class="img-fluid rounded-top-2 card-img" src="/img/Picture2.jpg" alt="testimoni" width="100%"
                                        height="auto">
                                </div>
                                <div class="card-body">
                                    <p class="text-secondary">21 Oktober 2024</p>
                                    <h5 style="font-size: 16px;">Jangan Cuma Nunggu! Ini Cara Efektif Follow Up Hasil Interview dengan Elegan</h5>
                                    <p class="text-justify" style="font-size: 14px;">
                                        Setelah tahap interview kerja, biasanya pelamar diminta untuk menunggu kabar hasil wawancara dengan
                                        tenggat waktu sekitar 2 minggu atau pelamar juga bisa menanyakan tanggal pasti ...
                                    </p>
                                    <a class="btn btn-primary mx-auto d-block rounded-2" href="contoh">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow rounded-2">
                                <div class="card-img-wrapper">
                                    <img class="img-fluid rounded-top-2 card-img" src="/img/Picture3.jpg" alt="testimoni" width="100%"
                                        height="auto">
                                </div>
                                <div class="card-body">
                                    <p class="text-secondary">22 Oktober 2024</p>
                                    <h5 style="font-size: 16px;">Cari Cuan Sampingan? Ini Dia Rekomendasi Situs Freelance Terbaik yang Wajib Kamu Coba!
                                    </h5>
                                    <p class="text-justify" style="font-size: 14px;">
                                        Sekarang ini banyak banget orang yang cari penghasilan tambahan dengan kerja freelance karena bisa
                                        dikerjakan kapan aja dan dimana aja. Sudah banyak sekali situs yang ...
                                    </p>
                                    <a class="btn btn-primary mx-auto d-block rounded-2" href="contoh">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow rounded-2">
                                <div class="card-img-wrapper">
                                    <img class="img-fluid rounded-top-2 card-img" src="/img/Picture4.jpg" alt="testimoni" width="100%"
                                        height="auto">
                                </div>
                                <div class="card-body">
                                    <p class="text-secondary">23 Oktober 2024</p>
                                    <h5 style="font-size: 16px;">Jawaban Jitu Saat HRD Bertanya: ‘Bagaimana
                                        Kamu Mengatur Prioritas dalam Pekerjaan?’
                                    </h5>
                                    <p class="text-justify" style="font-size: 14px;">
                                        Pertanyaan "Bagaimana cara kamu mengatur prioritas dalam pekerjaan?" sering muncul saat interview. Bukan
                                        tanpa alasan, HRD ingin tahu bagaimana kamu ...
                                    </p>
                                    <a class="btn btn-primary mx-auto d-block rounded-2" href="contoh">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow rounded-2">
                                <div class="card-img-wrapper">
                                    <img class="img-fluid rounded-top-2 card-img" src="/img/Picture5.jpg" alt="testimoni" width="100%"
                                        height="auto">
                                </div>
                                <div class="card-body">
                                    <p class="text-secondary">24 Oktober 2024</p>
                                    <h5 style="font-size: 16px;">Dapatkan Nilai Plus! Panduan Praktis untuk Meningkatkan Performa Wawancara</h5>
                                    <p class="text-justify" style="font-size: 14px;">
                                        Wawancara kerja sering kali menjadi momen krusial yang menentukan masa depan karier seseorang.
                                        Salah satu cara untuk menambah poin plus di mata rekruter adalah dengan mengajukan pertanyaan yang tepat.
                                    </p>
                                    <a class="btn btn-primary mx-auto d-block rounded-2" href="contoh">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class=" pb-5 contact" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h5 class="text-primary pt-5">kontak</h5>
                <h1 class="">Hubungi Kami</h1>
                <p class="">Cukup dengan mengisi formulir, anda dapat memberitahukan kepada kami mengenai pengalaman anda menggunakan jasa kami, dan lainnya.</p>
            </div>
            <div class="col-lg-6">
                <form action="/message" method="post">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email"><br>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="wa">Whatsapp</label>
                            <input class="form-control" type="wa" name="wa" id="wa"><br>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <textarea class="form-control" name=" keterangan" id=" keterangan" cols="30"
                                rows="5"></textarea><br>
                        </div>
                    </div>
                    <button class="btn btn-primary">Kirim Keterangan</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection