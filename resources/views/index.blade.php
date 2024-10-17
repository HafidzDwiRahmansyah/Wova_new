@extends('layouts.layout')

@section('title', 'Beranda')

@section('content')
<section class="content">
    <div class="container">
        <div class="jarak1"></div>
        <div class="row justify-content-arround">
            <div class="col-lg-5">
                <h3 class="text-white text-mobile-center-heading">WOVA GROUP</h3>
                <p class="text-white text-mobile-center">Wova CV adalah jasa pembuatan dokumen kerja yang di
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
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#uploadCvModal{{ $item->kode }}"
                                                    data-bs-dismiss="modal">
                                                    Upload CV Lama
                                                </button>
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
    <div class="cotainer">
        <h3 class="text-center my-5">Artikel</h3>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-10">
                <div class="swiper-artikel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card border-0 shadow rounded-2">
                                <img class="img-fluid" src="/image/testimoni.jpg" alt="testimoni2" width="100%"
                                    height="auto">
                                <div class="card-body">
                                    <p class="text-secondary">Artikel kedua</p>
                                    <h5 style="font-size: 16px;">Menjadi lebih produktif di tempat kerja</h5>
                                    <p class="text-justify" style="font-size: 14px;">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos fugiat aliquam
                                        quasi minima animi facere aliquid
                                    </p>
                                    <a class="btn btn-primary mx-auto d-block rounded-2" href="#">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow rounded-2">
                                <img class="img-fluid" src="/image/testimoni.jpg" alt="testimoni" width="100%"
                                    height="auto">
                                <div class="card-body">
                                    <p class="text-secondary">Artikel pertama</p>
                                    <h5 style="font-size: 16px;">Tips and trik interview pekerjaan</h5>
                                    <p class="text-justify" style="font-size: 14px;">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos fugiat aliquam
                                        quasi minima animi facere aliquid
                                    </p>
                                    <a class="btn btn-primary mx-auto d-block rounded-2" href="#">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class=" py-5 contact" id="contact">
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