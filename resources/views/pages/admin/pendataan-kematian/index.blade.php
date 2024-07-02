@extends('layouts.app')
@section('content')
    <div class="card mx-4 mt-3">
        <div class="d-flex justify-content-between card-header ">
            <h5 class="text-dark fw-bold">Pendataan Kematian</h5>
        </div>
        <div class="card ps-3 pe-3 pb-3">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive text-nowrap p-0">
                    <table id="myTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder text-start">No</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Nama Lengkap</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Jenis Kelamin</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Umur</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Tanggal Kematian</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Lokasi Pemakaman</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $index + 1 }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $item->nama_lengkap }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $item->jenis_kelamin }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    @php
                                        $tanggal_lahir = \Carbon\Carbon::parse($item->tanggal_lahir);
                                        $umur = $tanggal_lahir->diffInYears(\Carbon\Carbon::now());
                                    @endphp
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $umur }} Tahun</h6>
                                            </div>
                                        </div>
                                    </td>
                                    @if ($item->kematian)
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ \Carbon\Carbon::parse($item->kematian->tanggal_kematian)->translatedFormat('d F Y') }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->kematian->lokasi_pemakaman }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">

                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                @if (!$item->kematian && $item->status_jemaat == 'Hidup')
                                                    <button type="button" class="btn btn-info ubahStatusButton"
                                                        data-id="{{ $item->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-pencil-square me-1 mb-1" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                        </svg>
                                                        Ubah Status Jemaat ke Meninggal
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-dark" id="ubahStatusButton"
                                                        disabled>
                                                        Jemaat Dinyatakan Meninggal
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
                    <script>
                        let table = new DataTable('#myTable');
                    </script>
                </div>
            </div>
        </div>
    </div>
    <style>
        .swal2-input {



            font-size: 1rem;

            border: 1px solid #ced4da;
            border-radius: 0.25rem;

        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <script>
        // Gunakan event delegation untuk menangani klik pada tombol-tombol dengan class ubahStatusButton
        $(document).on('click', '.ubahStatusButton', function() {
            const jemaatId = $(this).data('id'); // Ambil data-id dari tombol yang diklik

            Swal.fire({
                title: 'Ubah Status Jemaat ke Meninggal',
                html: `<form id="ubahStatusForm">
                           <div class="form-group">
                               <label for="tanggalKematian">Tanggal Kematian</label>
                               <input type="date" class="swal2-input" id="tanggalKematian" required>
                           </div>
                           <div class="form-group">
                               <label for="lokasiPemakaman">Lokasi Pemakaman</label>
                               <input type="text" class="swal2-input" id="lokasiPemakaman" required>
                           </div>
                       </form>`,
                showCancelButton: true,
                confirmButtonText: 'Simpan Perubahan',
                preConfirm: () => {
                    const tanggalKematian = document.getElementById('tanggalKematian').value;
                    const lokasiPemakaman = document.getElementById('lokasiPemakaman').value;
                    if (!tanggalKematian || !lokasiPemakaman) {
                        Swal.showValidationMessage('Harap isi semua inputan');
                        return false;
                    }
                    return {
                        tanggalKematian: tanggalKematian,
                        lokasiPemakaman: lokasiPemakaman
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/pendataan-kematian/ubah-status-kematian',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: jemaatId,
                            tanggalKematian: result.value.tanggalKematian,
                            lokasiPemakaman: result.value.lokasiPemakaman
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire('Berhasil!', 'Status jemaat berhasil diubah.',
                                    'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan.', 'error');
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
