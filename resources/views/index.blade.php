<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDULUR - BPK Jambi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --bpk-blue: #004a99;
            --bpk-gold: #c5a02a;
            --bpk-red: #e63946;
            --glass-bg: rgba(255, 255, 255, 0.9);
        }

        body { 
            background-color: #f0f4f8; 
            font-family: 'Inter', 'Segoe UI', sans-serif; 
            scroll-behavior: smooth;
            color: #333;
        }

        /* Navbar Modern */
        .navbar {
            backdrop-filter: blur(10px);
            background: var(--glass-bg);
            border-bottom: 2px solid var(--bpk-gold);
        }
        .navbar-brand { font-weight: 800; font-size: 24px; letter-spacing: 1px; }
        .logo-nav { width: 45px; height: auto; margin-right: 12px; }

        /* Hero Section Premium */
        .hero { 
            padding: 80px 0 60px 0; 
            text-align: center; 
            background: radial-gradient(circle, #ffffff 0%, #e6eef7 100%);
        }
        .hero h1 { 
            font-weight: 900; 
            color: var(--bpk-blue); 
            font-size: 2.8rem; 
            text-shadow: 2px 2px 4px rgba(0,0,0,0.05);
        }
        .hero h2 { 
            font-size: 1.4rem; 
            color: var(--bpk-gold);
            letter-spacing: 2px;
            font-weight: 600;
        }

        /* Form Section Luxury */
        .form-section { 
            background: linear-gradient(135deg, var(--bpk-blue) 0%, #003366 100%); 
            padding: 60px 0; 
            border-top: 5px solid var(--bpk-gold);
            border-radius: 60px 60px 0 0; 
        }
        .form-container { 
            background: white; 
            border-radius: 35px; 
            padding: 40px; 
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }
        .form-control { 
            border-radius: 12px; 
            background-color: #f8f9fa; 
            border: 2px solid #eee; 
            padding: 12px 18px; 
            transition: 0.3s;
        }
        .form-control:focus {
            border-color: var(--bpk-gold);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(197, 160, 42, 0.1);
        }

        /* Camera & Capture Styling */
        .camera-container {
            background-color: #1a1a1a;
            border-radius: 30px;
            padding: 20px;
            margin: 25px 0;
            border: 3px solid #333;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.5);
        }
        #webcam {
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
            border: 2px solid #444;
            transform: scaleX(-1);
        }
        .btn-capture {
            background: linear-gradient(135deg, #00acee, #0072b1);
            color: white;
            border: none;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--bpk-red), #b3242f);
            border: none;
            border-radius: 50px;
            padding: 18px;
            font-weight: 800;
            font-size: 1.1rem;
            transition: 0.4s;
        }

        /* Card Alur Modern */
        .card-alur {
            border: none;
            border-radius: 25px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: white;
            padding: 30px 20px;
            height: 100%;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .card-alur:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 15px 30px rgba(0,74,153,0.1); 
        }
        .icon-box { 
            font-size: 3rem; 
            background: linear-gradient(135deg, var(--bpk-blue), #007bff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px; 
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo-bpk.png') }}" alt="Logo BPK" class="logo-nav">
                <span style="color: var(--bpk-blue);">SI</span><span style="color: var(--bpk-red);">DULUR</span>
            </a>
            <div class="navbar-nav ms-auto d-none d-lg-flex">
                <a class="nav-link fw-bold px-3" href="#">BERANDA</a>
                <a class="btn btn-outline-primary rounded-pill px-4 ms-3 fw-bold" href="#form">ISI FORMULIR</a>
                <a class="nav-link fw-bold px-3 ms-2" href="#alur">ALUR PANDUAN</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <img src="{{ asset('images/logo-bpk.png') }}" alt="Logo BPK" width="140" class="mb-4">
            <h2 class="text-uppercase">Selamat Datang di Portal</h2>
            <h1>Sistem Informasi Data Urusan Layanan</h1>
            <h2 class="text-uppercase mt-2">BPK Perwakilan Provinsi Jambi</h2>
        </div>
    </section>

    <section id="form" class="form-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-container">
                        <div class="text-center mb-5">
                            <img src="{{ asset('images/logo-bpk.png') }}" alt="Logo BPK" width="70" class="mb-3">
                            <h3 class="fw-bold">Formulir Kedatangan Tamu</h3>
                            <p class="text-muted">Harap mengisi data secara lengkap dan benar</p>
                        </div>
                        
                        <form action="/simpan-tamu" method="POST">
                            @csrf 
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama sesuai identitas" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Instansi / Organisasi</label>
                                    <input type="text" name="asal_instansi" class="form-control" placeholder="Contoh: PT. Maju Jaya" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Nomor WhatsApp</label>
                                    <input type="text" name="no_whatsapp" class="form-control" placeholder="08xxxxxxxxxx" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat tinggal saat ini" required></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Keperluan Kunjungan</label>
                                    <input type="text" name="keperluan" class="form-control" placeholder="Contoh: Koordinasi Audit" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Pegawai yang Dituju</label>
                                    <input type="text" name="pegawai_tujuan" class="form-control" placeholder="Nama Pegawai" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Unit Kerja</label>
                                    <input type="text" name="unit_kerja" class="form-control" placeholder="Bagian / Bidang" required>
                                </div>
                            </div>

                            <div class="camera-container text-center">
                                <span class="badge mb-3 px-3 py-2 text-white shadow-sm" style="background-color: var(--bpk-gold);">VERIFIKASI WAJAH (OPSIONAL)</span>
                                <video id="webcam" autoplay playsinline></video>
                                <canvas id="canvas" class="d-none"></canvas>
                                
                                <div class="mt-3">
                                    <button type="button" id="snap" class="btn btn-capture shadow">
                                        <i class="bi bi-camera-fill me-2"></i> AMBIL FOTO
                                    </button>
                                </div>
                                
                                <input type="hidden" name="foto_tamu" id="foto_tamu">
                                <div id="success-msg" class="mt-3 d-none">
                                    <span class="badge bg-success py-2 px-4 rounded-pill shadow-sm fs-6">
                                        <i class="bi bi-check-circle-fill me-2"></i> Foto Berhasil Tersimpan
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-submit text-white w-100 shadow mt-4">
                                KIRIM DATA SEKARANG <i class="bi bi-send-fill ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="alur" class="py-5 bg-white">
        <div class="container py-5 text-center">
            <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 3px;">Panduan</h6>
            <h2 class="fw-bold mb-5" style="font-size: 2.5rem;">Bagaimana Cara <span style="color: var(--bpk-red);">Mendaftar?</span></h2>
            <div class="row g-4 text-center justify-content-center">
                <div class="col-md-3 col-6">
                    <div class="card-alur">
                        <div class="icon-box"><i class="bi bi-qr-code-scan"></i></div>
                        <h5 class="fw-bold">1. Scan Akses</h5>
                        <p class="text-muted small">Scan QR Code di meja resepsionis.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card-alur">
                        <div class="icon-box"><i class="bi bi-person-lines-fill"></i></div>
                        <h5 class="fw-bold">2. Isi Data</h5>
                        <p class="text-muted small">Lengkapi formulir yang tersedia di atas.</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card-alur">
                        <div class="icon-box"><i class="bi bi-shield-check"></i></div>
                        <h5 class="fw-bold">3. Selesai</h5>
                        <p class="text-muted small">Tunggu petugas memanggil Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-5 bg-light border-top">
        <div class="container">
            <p class="text-muted mb-0 font-weight-bold">© 2026 <strong>BPK Perwakilan Provinsi Jambi</strong></p>
            <p class="text-secondary small mt-1">Dikembangkan oleh Novi - Program Magang Sistem Informasi</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const video = document.getElementById('webcam');
        const canvas = document.getElementById('canvas');
        const snap = document.getElementById('snap');
        const fotoInput = document.getElementById('foto_tamu');
        const successMsg = document.getElementById('success-msg');

        navigator.mediaDevices.getUserMedia({ video: true, audio: false })
            .then(function(stream) {
                video.srcObject = stream;
            })
            .catch(function(err) {
                console.log("Kamera tidak diizinkan atau tidak ditemukan.");
                // Form tetap bisa digunakan meski kamera gagal/tidak ada
            });

        snap.addEventListener("click", function() {
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.translate(canvas.width, 0);
            context.scale(-1, 1);
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            
            const dataURL = canvas.toDataURL('image/png');
            fotoInput.value = dataURL;
            
            successMsg.classList.remove('d-none');
            snap.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i> ULANGI FOTO';
            snap.className = 'btn btn-warning rounded-pill px-4 fw-bold shadow-sm';
        });
    </script>
</body>
</html>