<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Wova Group</title>
    <link rel="shortcut icon" href="/image/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplelightbox@2.10.1/dist/simple-lightbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm" id="navbar">
        <div class="container">
            <a href="/"><img class="img-responsive" src="/image/logo/logo.png" alt="" width="25%" height="auto"></a>
            <button class="navbar-toggler border-0" onclick="toggleScroll()" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#katalog">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer>
        <div class="container">
            <div class="row py-5 g-0 justify-content-center">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <h3 class="">WOVA GROUP</h3>
                    <p class="">Tagline dari wova group</p>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <h4 class="">Menu Kami</h4>
                    <ul class="navbar-nav">
                        <div class="row mt-3 justify-content-center">
                            <div class="col-lg-6">
                                <li class="nav-item">
                                    <a class="nav-link cursor-hover" href="/">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link cursor-hover" href="/about">Tentang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link cursor-hover" href="#katalog">Katalog</a>
                                </li>
                            </div>
                            <div class="col-lg-6">
                                <li class="nav-item">
                                    <a class="nav-link cursor-hover" href="#testimoni">Testimoni</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link cursor-hover" href="#artikel">Artikel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link cursor-hover" href="#contact">Kontak</a>
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <h4>Kontak Kami</h4>
                    <ul class="navbar-nav">
                        <li class="nav-item py-2">
                            <a class="nav-link cursor-hover" href="https://www.instagram.com/wova.group/" target="_blank"><i
                                    class="bi bi-instagram pe-2"></i>Wova Group</a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="nav-link cursor-hover" href="https://www.tiktok.com/@wova.jasacv" target="_blank"><i
                                    class="bi bi-tiktok text-dark pe-2"></i>Wova Group</a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="nav-link cursor-hover" href="https://www.tiktok.com/@shivadestya" target="_blank"><i
                                    class="bi bi-tiktok text-dark pe-2"></i>Shiva Destya</a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="nav-link cursor-hover"
                                href="https://www.linkedin.com/company/wova-group/posts/?feedView=all" target="_blank"><i
                                    class="bi bi-linkedin pe-2 text-primary"></i>Wova Group</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/simplelightbox@2.10.1/dist/simple-lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
    <script>
        Swal.fire({
            title: "Berhasil !",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
    @endif
    @if (session('error'))
    <script>
        Swal.fire({
            title: "Gagal !",
            text: "{{ session('error') }}",
            icon: "error"
        });
    </script>
    @endif

    <script>
        AOS.init();
    </script>
    <!-- Tambahkan pustaka pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

    <script>
        // Fungsi untuk menghitung jumlah halaman dari file PDF
        function countPdfPages(file, kode) {
            const reader = new FileReader();

            reader.onload = function() {
                const typedarray = new Uint8Array(this.result);
                pdfjsLib.getDocument(typedarray).promise.then(function(pdf) {
                    const totalPages = pdf.numPages;
                    document.getElementById(`page-count${kode}`).innerText = totalPages;
                }).catch(function(error) {
                    console.error('Error reading PDF: ', error);
                    document.getElementById(`page-count${kode}`).innerText = 'Tidak dapat membaca file PDF';
                });
            };

            reader.readAsArrayBuffer(file);
        }

        // Event listener untuk input file PDF
        document.querySelectorAll('input[type="file"][name="pdf-upload"]').forEach(input => {
            input.addEventListener('change', function(event) {
                const kode = this.id.replace('pdfUpload', '');
                const file = event.target.files[0];

                if (file && file.type === 'application/pdf') {
                    countPdfPages(file, kode);
                } else {
                    document.getElementById(`page-count${kode}`).innerText = 'Harap upload file PDF';
                }
            });
        });

        // Menghitung jumlah karakter pada textarea dengan batasan 300 karakter
        document.querySelectorAll('textarea[name="note"]').forEach(textarea => {
            textarea.addEventListener('input', function() {
                const kode = this.id.replace('limitedTextarea', '');
                let textValue = this.value;

                // Batasi input hingga 300 karakter
                if (textValue.length > 300) {
                    textValue = textValue.substring(0, 300);
                    this.value = textValue;
                }

                const characterCount = textValue.length;
                document.getElementById(`wordCount${kode}`).innerText = characterCount;
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lightbox = new SimpleLightbox('.gallery a', {});
        });
    </script>
    <script>
        document.addEventListener("scroll", function() {
            var navbar = document.getElementById("navbar");
            if (window.scrollY > 10) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });

        function toggleScroll() {
            var navbar = document.getElementById("navbar");
            if (window.scrollY < 10) {
                navbar.classList.toggle("scrolled");
            } else {
                navbar.classList.add("scrolled");
            }
        }
    </script>
    <script>
        var swiper = new Swiper(".Testimoni", {
            slidesPerView: 4, // Default untuk ukuran layar besar
            spaceBetween: 30,
            freeMode: true,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1, // 1 slide untuk layar mobile (320px ke atas)
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2, // 2 slides untuk tablet (768px ke atas)
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3, // 3 slides untuk layar yang lebih besar (1024px ke atas)
                    spaceBetween: 30,
                },
                1200: {
                    slidesPerView: 4, // Default 4 slides untuk layar besar (1200px ke atas)
                    spaceBetween: 30,
                }
            }
        });
    </script>
    <script>
        var swiper = new Swiper(".Artikel", {
            slidesPerView: 3,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 800,
            breakpoints: {
                320: {
                    slidesPerView: 1, // 1 slide untuk layar mobile (320px ke atas)
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2, // 2 slides untuk tablet (768px ke atas)
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3, // 3 slides untuk layar yang lebih besar (1024px ke atas)
                    spaceBetween: 30,
                }
            }
        });
    </script>
    @if (session('success'))
    <script>
        iziToast.success({
            title: 'success',
            message: "{{ session('success') }}",
            position: 'topRight'
        });
    </script>
    @endif
    @if (session('error'))
    <script>
        iziToast.error({
            title: 'error',
            message: "{{ session('error') }}",
            position: 'topRight'
        });
    </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            const formSteps = document.querySelectorAll('.form-step');
            let currentStep = 0;

            // Fungsi untuk memeriksa validasi form dan menampilkan pesan kesalahan
            function validateCurrentStep() {
                const inputs = formSteps[currentStep].querySelectorAll('input[required]');
                let isValid = true;
                inputs.forEach(input => {
                    const errorMessage = input.nextElementSibling; // Elemen di bawah input (tempat pesan error)
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('is-invalid'); // Tambahkan kelas CSS untuk validasi
                        if (errorMessage && errorMessage.classList.contains('error-message')) {
                            errorMessage.textContent = 'Field ini wajib diisi.'; // Tampilkan pesan error
                            errorMessage.style.display = 'block';
                        }
                    } else {
                        input.classList.remove('is-invalid');
                        if (errorMessage && errorMessage.classList.contains('error-message')) {
                            errorMessage.style.display = 'none'; // Sembunyikan pesan error jika valid
                        }
                    }
                });
                return isValid;
            }

            // Fungsi untuk menyembunyikan pesan error saat pengguna mulai mengisi input
            function hideErrorOnInput(input) {
                input.addEventListener('input', () => {
                    const errorMessage = input.nextElementSibling;
                    if (input.value.trim()) {
                        input.classList.remove('is-invalid'); // Hapus status invalid
                        if (errorMessage && errorMessage.classList.contains('error-message')) {
                            errorMessage.style.display = 'none'; // Sembunyikan pesan error
                        }
                    }
                });
            }

            // Tambahkan event listener untuk setiap input yang memerlukan validasi
            formSteps.forEach(step => {
                const inputs = step.querySelectorAll('input[required]');
                inputs.forEach(input => {
                    hideErrorOnInput(input); // Aktifkan hideErrorOnInput untuk setiap input
                });
            });

            nextButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (validateCurrentStep()) {
                        formSteps[currentStep].classList.remove('form-step-active');
                        currentStep++;
                        formSteps[currentStep].classList.add('form-step-active');
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', () => {
                    formSteps[currentStep].classList.remove('form-step-active');
                    currentStep--;
                    formSteps[currentStep].classList.add('form-step-active');
                });
            });

            document.getElementById('multiStepForm').addEventListener('submit', function(event) {
                event.preventDefault();
                if (validateCurrentStep()) {
                    console.log('Form submitted successfully!');
                }
            });
        });
    </script>



</body>

</html>