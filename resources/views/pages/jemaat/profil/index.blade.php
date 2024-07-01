@extends('layouts.app')
@section('content')
    <div class="container-fluid px-2 px-md-4">
        <div class="card card-body mx-4 mx-md-4 mt-3">
            <div class="row gx-4 mb-2 mt-3">
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" id="app-tab" data-bs-toggle="tab"
                                    href="#app-content" role="tab" aria-controls="app-content" aria-selected="true">
                                    <i class="material-icons text-lg position-relative">home</i>
                                    <span class="ms-1">Profil</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" id="settings-tab" data-bs-toggle="tab"
                                    href="#settings-content" role="tab" aria-controls="settings-content"
                                    aria-selected="false">
                                    <i class="material-icons text-lg position-relative">settings</i>
                                    <span class="ms-1">Riwayat</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="app-content" role="tabpanel" aria-labelledby="app-tab">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h5 class="mb-3">Profil Anda</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ $data->nama_lengkap }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ $data->jenis_kelamin }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}"
                                        readonly>
                                </div>
                                @php
                                    $tanggal_lahir = \Carbon\Carbon::parse($data->tanggal_lahir);
                                    $umur = $tanggal_lahir->diffInYears(\Carbon\Carbon::now());
                                @endphp
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Umur</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ $umur }} Tahun" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ $data->NIK }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ $data->alamat }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Golongan Darah</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ $data->golongan_darah }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status Vaksin</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ $data->status_vaksin }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ $data->nama_ayah }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value="{{ $data->nama_ibu }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="settings-content" role="tabpanel" aria-labelledby="settings-tab">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h5 class="">Data Baptis</h5>
                                </div>
                            </div>
                        </div>
                        @if ($data->baptis && $data->baptis->status_baptis == 'Sudah Baptis')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Baptis</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ \Carbon\Carbon::parse($data->baptis->tanggal_baptis)->translatedFormat('d F Y') }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status Baptis</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->baptis->status_baptis }}" readonly>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <p class="ml-5">Tidak Ada Data Baptis / Belum Mendaftar Baptis</p>
                            </div>
                        @endif
                    </div>
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h5 class="">Data Sidi</h5>
                                </div>
                            </div>
                        </div>
                        @if ($data->sidi && $data->sidi->status_sidi == 'Sudah Sidi')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Sidi</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ \Carbon\Carbon::parse($data->sidi->tanggal_sidi)->translatedFormat('d F Y') }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status Sidi</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->sidi->status_sidi }}" readonly>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <p class="ml-5">Tidak Ada Data Sidi / Belum Mendaftar Sidi</p>
                            </div>
                        @endif
                    </div>
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h5 class="">Data Menikah</h5>
                                </div>
                            </div>
                        </div>
                        @if ($data->menikah && $data->menikah->status_menikah == 'Sudah Menikah')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap Pasangan</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->menikah->nama_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tempat, Tanggal Lahir Pasangan</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->menikah->tempat_lahir_pasangan }}, {{ \Carbon\Carbon::parse($data->menikah->tanggal_lahir_pasangan)->translatedFormat('d F Y') }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ayah Pasangan</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->menikah->nama_ayah_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ibu Pasangan</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->menikah->nama_ibu_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Pernikahan</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ \Carbon\Carbon::parse($data->menikah->tanggal_pernikahan)->translatedFormat('d F Y') }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status Menikah</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->menikah->status_menikah }}" readonly>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <p class="ml-5">Tidak Ada Data Menikah / Belum Menikah</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
