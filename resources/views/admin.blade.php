<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDULUR Admin - BPK Jambi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --bpk-blue: #004a99;
            --bpk-gold: #c5a02a;
            --sidebar-width: 260px;
        }

        body { 
            background-color: #f0f2f5; 
            font-family: 'Inter', 'Segoe UI', sans-serif; 
        }

        /* Sidebar Luxury */
        .sidebar { 
            background: linear-gradient(180deg, #003366 0%, #001a33 100%); 
            min-height: 100vh; 
            color: white; 
            padding: 30px 20px; 
            position: fixed;
            width: var(--sidebar-width);
            border-right: 4px solid var(--bpk-gold);
            z-index: 1000;
        }
        .sidebar h4 { font-weight: 800; letter-spacing: 1px; margin-bottom: 40px; }
        .nav-link { 
            color: rgba(255,255,255,0.7); 
            border-radius: 12px; 
            margin-bottom: 10px; 
            padding: 12px 20px;
            transition: 0.3s;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .nav-link:hover, .nav-link.active { 
            background: rgba(255,255,255,0.1); 
            color: white; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* Main Content Area */
        .main-content { margin-left: var(--sidebar-width); padding: 40px; }

        /* Card & Table Styling */
        .card-table { 
            border: none; 
            border-radius: 25px; 
            background: white; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.03); 
            overflow: hidden;
        }
        .table thead { 
            background-color: #f8f9fa; 
            border-bottom: 2px solid #eee;
        }
        .table thead th { 
            text-transform: uppercase; 
            font-size: 0.75rem; 
            letter-spacing: 1px; 
            padding: 20px; 
            color: #6c757d;
        }
        
        .table tbody tr { transition: 0.2s; border-bottom: 1px solid #f8f9fa; }
        .table tbody tr:hover { background-color: #fcfdfe; }

        /* Profile Image in Table */
        .img-tamu { 
            width: 60px; height: 60px; 
            object-fit: cover; 
            border-radius: 15px; 
            border: 2px solid #fff; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .img-tamu:hover { transform: scale(1.1); }

        /* Action Buttons */
        .btn-action { 
            width: 38px; height: 38px; 
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 12px; 
            transition: 0.3s;
            border: none;
        }
        .btn-detail { background: #e9f2ff; color: var(--bpk-blue); }
        .btn-delete { background: #fff1f2; color: #e63946; }
        
        .btn-action:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }

        /* Filter Section */
        .filter-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        }

        .badge-count { 
            background: var(--bpk-gold); 
            color: white;
            font-weight: 700; 
            padding: 10px 20px; 
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(197, 160, 42, 0.3);
        }

        /* --- KODE PERBAIKAN CETAK (PRINT) --- */
        @media print {
            .sidebar, .filter-card, .btn-action, .badge-count, .alert, .bi-printer-fill {
                display: none !important;
            }
            .main-content {
                margin-left: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
            body {
                background-color: white !important;
            }
            .card-table {
                box-shadow: none !important;
                border: 1px solid #000 !important;
                border-radius: 0 !important;
            }
            .table thead th {
                background-color: #eee !important;
                color: black !important;
                border: 1px solid #000 !important;
            }
            .table tbody td {
                border: 1px solid #000 !important;
            }
            /* Sembunyikan kolom AKSI saat diprint */
            .table th:last-child, .table td:last-child {
                display: none !important;
            }
            .img-tamu {
                width: 50px !important;
                height: 50px !important;
                box-shadow: none !important;
            }
        }
    </style>
</head>
<body>

<div class="sidebar d-none d-md-block shadow">
    <div class="text-center mb-4">
        <img src="{{ asset('images/logo-bpk.png') }}" width="60" class="mb-3">
        <h4 class="fw-extrabold text-white">SIDULUR <span style="color: var(--bpk-gold);">BPK</span></h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link active"><i class="bi bi-grid-1x2-fill me-3"></i> DASHBOARD</a>
        </li>
        <li class="nav-item">
            <a href="#rekapSection" class="nav-link"><i class="bi bi-file-earmark-bar-graph-fill me-3"></i> REKAP BULANAN</a>
        </li>
        <li class="nav-item">
            <a href="/" class="nav-link"><i class="bi bi-file-earmark-text-fill me-3"></i> LIHAT FORM</a>
        </li>
    </ul>
</div>

<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold mb-1 text-dark">Manajemen Tamu</h2>
            <p class="text-muted small mb-0">Monitor data kunjungan BPK Perwakilan Jambi</p>
        </div>
        <div class="d-flex align-items-center gap-3">
            @if(session('success'))
                <div class="alert alert-success py-2 px-4 mb-0 small rounded-pill shadow-sm">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                </div>
            @endif
            <div class="badge-count">
                <i class="bi bi-people-fill me-2"></i> {{ $daftarTamu->count() }} Tamu Terfilter
            </div>
        </div>
    </div>

    <div id="rekapSection" class="filter-card">
        <div class="row align-items-center">
            <div class="col-md-7">
                <form action="{{ route('admin.index') }}" method="GET" class="d-flex gap-2">
                    <select name="bulan" class="form-select border-0 bg-light rounded-pill px-3">
                        @for($i=1; $i<=12; $i++)
                            <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $i, 10)) }}
                            </option>
                        @endfor
                    </select>

                    <select name="tahun" class="form-select border-0 bg-light rounded-pill px-3">
                        @for($y=date('Y'); $y>=2024; $y--)
                            <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endfor
                    </select>

                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Filter</button>
                </form>
            </div>
            <div class="col-md-5 text-end">
                <button onclick="window.print()" class="btn btn-dark rounded-pill px-4 shadow-sm">
                    <i class="bi bi-printer-fill me-2"></i> Cetak Laporan PDF
                </button>
            </div>
        </div>
    </div>

    <div class="card card-table shadow-sm">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Identitas Tamu</th>
                        <th>Waktu Masuk</th>
                        <th>Instansi</th>
                        <th>Tujuan Kunjungan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($daftarTamu as $tamu)
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ $tamu->foto_tamu }}" class="img-tamu me-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalFoto{{ $tamu->id }}">
                                <div>
                                    <div class="fw-bold text-dark">{{ $tamu->nama_lengkap }}</div>

                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $tamu->created_at->format('H:i') }} WIB</div>
                            <small class="text-muted" style="font-size: 0.75rem;">{{ $tamu->created_at->format('d M Y') }}</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark fw-medium border px-2 py-1">{{ $tamu->asal_instansi }}</span>
                        </td>
                        <td>
                            <div class="fw-bold" style="font-size: 0.9rem;">{{ $tamu->pegawai_tujuan }}</div>
                            <small class="text-primary text-uppercase fw-bold" style="font-size: 0.65rem;">{{ $tamu->unit_kerja }}</small>
                        </td>
                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn-action btn-detail" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $tamu->id }}" title="Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                                <form action="{{ route('tamu.destroy', $tamu->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data tamu ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="bi bi-info-circle me-2"></i> Tidak ada data tamu untuk periode ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach($daftarTamu as $tamu)
    <div class="modal fade" id="modalFoto{{ $tamu->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg bg-dark border-0">
                <div class="modal-body text-center p-0">
                    <img src="{{ $tamu->foto_tamu }}" class="img-fluid rounded border border-light shadow-lg">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetail{{ $tamu->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 30px;">
                <div class="modal-header bg-primary text-white border-0 py-3" style="border-radius: 30px 30px 0 0;">
                    <h5 class="modal-title fw-bold ms-3"><i class="bi bi-person-badge me-2"></i>Detail Informasi Tamu</h5>
                    <button type="button" class="btn-close btn-close-white me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-5 text-center mb-3">
                            <img src="{{ $tamu->foto_tamu }}" class="img-fluid rounded-4 shadow border border-2 w-100 mb-3">
                            <div class="badge bg-light text-dark border p-2 w-100">Waktu Masuk: {{ $tamu->created_at->format('H:i') }} WIB</div>
                        </div>
                        <div class="col-md-7">
                            <table class="table table-sm table-borderless mt-2">
                                <tr><th class="text-muted">NAMA LENGKAP</th><td>: <strong class="text-capitalize text-dark">{{ $tamu->nama_lengkap }}</strong></td></tr>
                                <tr><th class="text-muted">INSTANSI</th><td>: {{ $tamu->asal_instansi }}</td></tr>
                                <tr>
                                    <th class="text-muted">WHATSAPP</th>
                                    <td>: <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $tamu->no_whatsapp) }}" target="_blank" class="text-success fw-bold text-decoration-none"><i class="bi bi-whatsapp"></i> {{ $tamu->no_whatsapp }}</a></td>
                                </tr>
                                <tr><th class="text-muted">ALAMAT</th><td>: {{ $tamu->alamat }}</td></tr>
                                <tr><td colspan="2"><hr class="my-3"></td></tr>
                                <tr><th class="text-muted">KEPERLUAN</th><td>: <span class="badge bg-danger px-3 rounded-pill">{{ $tamu->keperluan }}</span></td></tr>
                                <tr><th class="text-muted">PEGAWAI TUJUAN</th><td>: {{ $tamu->pegawai_tujuan }}</td></tr>
                                <tr><th class="text-muted">UNIT KERJA</th><td>: <span class="text-primary fw-semibold">{{ $tamu->unit_kerja }}</span></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light" style="border-radius: 0 0 30px 30px;">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>