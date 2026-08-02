<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - Juwita Anatasyah Zaharani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/project.css">
</head>
<body>

    <header class="header-navbar sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid p-0">
                    <a class="navbar-brand logo-box" href="index.html">
                        <img src="img/logo.png" alt="Logo" class="logo"/>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto nav-list align-items-center">
                            <li class="nav-item"><a class="nav-link" href="index.html">home</a></li>
                            <li class="nav-item"><a class="nav-link active" href="about.html">about</a></li>
                            <li class="nav-item"><a class="nav-link" href="activity.html">activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section id="funfact" class="py-5">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h1>About Me & Projects</h1>
                <div class="line mx-auto"></div>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- BIODATA -->
                <div class="col-md-4">
                    <div class="card h-100 text-center p-3 shadow-sm fact">
                        <img src="img/profill.jpeg" class="card-img-top rounded mx-auto" alt="Biodata">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title h5 mt-2">Biodata Singkat</h3>
                            <p class="card-text flex-grow-1">
                                Halloo! saya juwita anatasyah zaharani <br>
                                tempat/tanggal lahir: 09 maret 2008, jambi <br>
                                jenis kelamin: perempuan
                            </p>
                            <a href="biodata-detail.html" class="btn btn-primary btn-sm mt-3 align-self-center">Lihat Biodata</a>
                        </div>
                    </div>
                </div>

                <!-- PENDIDIKAN -->
                <div class="col-md-4">
                    <div class="card h-100 text-center p-3 shadow-sm fact">
                        <img src="img/pendidikan.jpg" class="card-img-top rounded mx-auto" alt="Pendidikan">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title h5 mt-2">Pendidikan</h3>
                            <p class="card-text flex-grow-1">
                                <strong>D4 Teknologi Rekayasa Perangkat Lunak</strong><br>
                                Menempuh semester 2 di Politeknik Jambi. Aktif mempelajari logika pemrograman, basis data, dan perancangan perangkat lunak.
                            </p>
                            <a href="pendidikan-detail.html" class="btn btn-primary btn-sm mt-3 align-self-center">Detail Pendidikan</a>
                        </div>
                    </div>
                </div>

                <!-- PROJECT SEMESTER 1 -->
                <div class="col-md-4">
                    <div class="card h-100 text-center p-3 shadow-sm fact">
                        <img src="img/projectsem1.png" class="card-img-top rounded mx-auto" alt="Project Semester 1">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title h5 mt-2">Project Semester 1</h3>
                            <p class="card-text flex-grow-1">
                                Tugas-tugas semester awal: Dasar elemen desain, logika perulangan (faktorial), dan web development.
                            </p>
                            <a href="project-detail.html" class="btn btn-primary btn-sm mt-3 align-self-center">Lihat Projects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS/project.js"></script>
</body>
</html>
