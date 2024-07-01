@extends('layouts.app')
@section('content')
    <div class="card mx-4 mt-3">
        <div class="d-flex justify-content-between card-header ">
            <h5 class="text-dark fw-bold">Pendataan Sidi</h5>
        </div>
        <div class="card ps-3 pe-3 pb-3">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive text-nowrap p-0">
                    <table id="myTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder text-start">No</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Nama Pendaftar Sidi</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Jenis Kelamin</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Umur</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Mengajukan Tanggal Sidi</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Status Sidi</th>
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
                                                <h6 class="mb-0 text-sm">{{ $item->jemaat->nama_lengkap }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $item->jemaat->jenis_kelamin }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    @php
                                        $tanggal_lahir = \Carbon\Carbon::parse($item->jemaat->tanggal_lahir);
                                        $umur = $tanggal_lahir->diffInYears(\Carbon\Carbon::now());
                                    @endphp
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $umur }} Tahun</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">
                                                    {{ \Carbon\Carbon::parse($item->tanggal_sidi)->translatedFormat('d F Y') }}
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $item->status_sidi }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-2">
                                                    <form action="/pendataan-sidi/unduh-surat-baptis/{{ $item->id }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <button type="submit" class="btn btn-dark">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-download mb-1 me-1" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                                <path
                                                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                                            </svg>
                                                            Unduh Surat Baptis
                                                        </button>
                                                    </form>
                                                </div>
                                                <div>
                                                    @if ($item->status_sidi == 'Mendaftar')
                                                        <form id="konfirmasi-sidi-{{ $item->id }}"
                                                            action="/pendataan-sidi/{{ $item->id }}" method="POST"
                                                            role="form text-left">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="action_type"
                                                                value="konfirmasi_sidi">
                                                            <button type="submit" class="btn btn-success">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-question-octagon mb-1 me-1"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z" />
                                                                    <path
                                                                        d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94" />
                                                                </svg>
                                                                Konfirmasi Sidi
                                                            </button>
                                                        </form>
                                                    @elseif($item->status_sidi == 'Dikonfirmasi')
                                                        <form id="sudah-sidi-{{ $item->id }}"
                                                            action="/pendataan-sidi/{{ $item->id }}" method="POST"
                                                            role="form text-left"
                                                            onsubmit="event.preventDefault(); confirmSudahSidi({{ $item->id }})">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="action_type" value="sudah_sidi">
                                                            <button type="submit" class="btn btn-info">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-check-circle mb-1 me-1"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                    <path
                                                                        d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                                </svg>
                                                                Jemaat Sudah Sidi
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmSudahSidi(id) {
            Swal.fire({
                title: "Konfirmasi Jemaat Sidi",
                text: "Apakah jemaat sudah melaksanakan sidi?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Sudah"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('sudah-sidi-' + id).submit();
                }
            });
        }
    </script>
@endsection
