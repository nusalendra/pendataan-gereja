@extends('layouts.app')
@section('content')
    <div class="container-fluid px-2 px-md-4">
        <div class="card card-body mx-4 mx-md-4 mt-3">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="app-content" role="tabpanel" aria-labelledby="app-tab">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h5 class="mb-3">Data Pasangan Pria</h5>
                                </div>
                            </div>
                        </div>
                        @if ($data->jemaat->jenis_kelamin == 'Pria')
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jemaat->nama_lengkap }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jemaat->jenis_kelamin }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ \Carbon\Carbon::parse($data->jemaat->tanggal_lahir)->translatedFormat('d F Y') }}"
                                            readonly>
                                    </div>
                                    @php
                                        $tanggal_lahir = \Carbon\Carbon::parse($data->jemaat->tanggal_lahir);
                                        $umur = $tanggal_lahir->diffInYears(\Carbon\Carbon::now());
                                    @endphp
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Umur</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $umur }} Tahun" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ayah</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jemaat->nama_ayah }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jemaat->nama_ibu }}" readonly>
                                    </div>
                                </div>
                            </div>
                        @elseif($data->jenis_kelamin_pasangan == 'Pria')
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->nama_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jenis_kelamin_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tempat, Tanggal Lahir</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->tempat_lahir_pasangan }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}"
                                            readonly>
                                    </div>
                                    @php
                                        $tanggal_lahir = \Carbon\Carbon::parse($data->tanggal_lahir_pasangan);
                                        $umur = $tanggal_lahir->diffInYears(\Carbon\Carbon::now());
                                    @endphp
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Umur</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $umur }} Tahun" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ayah</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->nama_ayah_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->nama_ibu_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Unduh Surat Baptis</label>
                                        <form
                                            action="/pendataan-menikah/unduh-berkas-pendaftaran-menikah/{{ $data->id }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="action_type" value="surat_baptis_pasangan">
                                            <button type="submit" class="btn btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-download mb-1 me-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                    <path
                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                                </svg>
                                                Unduh Surat Baptis
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Unduh Surat Sidi</label>
                                        <form
                                            action="/pendataan-menikah/unduh-berkas-pendaftaran-menikah/{{ $data->id }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="action_type" value="surat_sidi_pasangan">
                                            <button type="submit" class="btn btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-download mb-1 me-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                    <path
                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                                </svg>
                                                Unduh Surat Sidi
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h5 class="mb-3">Data Pasangan Wanita</h5>
                                </div>
                            </div>
                        </div>
                        @if ($data->jemaat->jenis_kelamin == 'Wanita')
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jemaat->nama_lengkap }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jemaat->jenis_kelamin }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ \Carbon\Carbon::parse($data->jemaat->tanggal_lahir)->translatedFormat('d F Y') }}"
                                            readonly>
                                    </div>
                                    @php
                                        $tanggal_lahir = \Carbon\Carbon::parse($data->jemaat->tanggal_lahir);
                                        $umur = $tanggal_lahir->diffInYears(\Carbon\Carbon::now());
                                    @endphp
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Umur</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $umur }} Tahun" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ayah</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jemaat->nama_ayah }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jemaat->nama_ibu }}" readonly>
                                    </div>
                                </div>
                            </div>
                        @elseif($data->jenis_kelamin_pasangan == 'Wanita')
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->nama_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->jenis_kelamin_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tempat, Tanggal Lahir</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->tempat_lahir_pasangan }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}"
                                            readonly>
                                    </div>
                                    @php
                                        $tanggal_lahir = \Carbon\Carbon::parse($data->tanggal_lahir_pasangan);
                                        $umur = $tanggal_lahir->diffInYears(\Carbon\Carbon::now());
                                    @endphp
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Umur</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $umur }} Tahun" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ayah</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->nama_ayah_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->nama_ibu_pasangan }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Unduh Surat Baptis</label>
                                        <form
                                            action="/pendataan-menikah/unduh-berkas-pendaftaran-menikah/{{ $data->id }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="action_type" value="surat_baptis_pasangan">
                                            <button type="submit" class="btn btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-download mb-1 me-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                    <path
                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                                </svg>
                                                Unduh Surat Baptis
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Unduh Surat Sidi</label>
                                        <form
                                            action="/pendataan-menikah/unduh-berkas-pendaftaran-menikah/{{ $data->id }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="action_type" value="surat_sidi_pasangan">
                                            <button type="submit" class="btn btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-download mb-1 me-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                    <path
                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                                </svg>
                                                Unduh Surat Sidi
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
