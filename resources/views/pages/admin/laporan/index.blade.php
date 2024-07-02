@extends('layouts.app')
@section('content')
    <div class="card mx-4 mt-3">
        <div class="d-flex justify-content-between card-header ">
            <h5 class="text-dark fw-bold">Laporan</h5>
            <a href="/laporan/cetak-pdf" target="_blank">
                <button type="button" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-printer mb-1 me-1" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                    </svg>
                    Cetak PDF
                </button>
            </a>
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
                                <th class="text-uppercase text-xs font-weight-bolder">Status Baptis</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Status Sidi</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Status Pernikahan</th>
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
                                    @if ($item->baptis)
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->baptis->status_baptis }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Belum Baptis</h6>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                    @if ($item->sidi)
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->sidi->status_sidi }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Belum Sidi</h6>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                    @if ($item->menikah)
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->menikah->status_menikah }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Belum Menikah</h6>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
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
@endsection
