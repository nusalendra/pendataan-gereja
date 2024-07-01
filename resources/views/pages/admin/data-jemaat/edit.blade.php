@extends('layouts.app')
@section('content')
    <div class="row mx-4 mt-3">
        <div class="card-header bg-dark">
            <h5 class="mb-2 fw-bold text-white p-1 rounded">Edit Jemaat</h5>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form action="/data-jemaat/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <h5 class="mb-4 fw-semibold">Identitas Jemaat</h5>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="mb-3 mx-2 w-50">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" value="{{ $data->nama_lengkap }}"
                                id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="mb-3 mx-2 w-50">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Pria" {{ $data->jenis_kelamin === 'Pria' ? 'selected' : '' }}>Pria
                                </option>
                                <option value="Wanita" {{ $data->jenis_kelamin === 'Wanita' ? 'selected' : '' }}>Wanita
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="mb-3 mx-2 w-50">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir"
                                value="{{ $data->tanggal_lahir }}" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir"
                            >
                        </div>
                        <div class="mb-3 mx-2 w-50">
                            <label for="NIK" class="form-label">NIK</label>
                            <input type="number" class="form-control" name="NIK" value="{{ $data->NIK }}"
                                id="NIK" placeholder="Masukkan NIK">
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="mb-3 mx-2 w-50">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}"
                                id="alamat" placeholder="Masukkan Alamat">
                        </div>
                        <div class="mb-3 mx-2 w-50">
                            <label for="golongan_darah">Golongan Darah</label>
                            <select name="golongan_darah" class="form-select" aria-label="Default select example">
                                <option selected disabled>Pilih Golongan Darah</option>
                                <option value="A" {{ $data->golongan_darah === 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $data->golongan_darah === 'B' ? 'selected' : '' }}>B
                                <option value="AB" {{ $data->golongan_darah === 'AB' ? 'selected' : '' }}>AB</option>
                                <option value="O" {{ $data->golongan_darah === 'O' ? 'selected' : '' }}>O</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="mb-3 mx-2 w-50">
                            <label for="nama_ayah" class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" value="{{ $data->nama_ayah }}"
                                id="nama_ayah" placeholder="Masukkan Nama Ayah">
                        </div>
                        <div class="mb-3 mx-2 w-50">
                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" value="{{ $data->nama_ibu }}"
                                id="nama_ibu" placeholder="Masukkan Nama Ibu">
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="mb-3 mx-2 w-50">
                            <label for="status_vaksin">Status Vaksin</label>
                            <select name="status_vaksin" class="form-select" aria-label="Default select example">
                                <option selected disabled>Pilih Status Vaksin</option>
                                <option value="Sudah Vaksin"
                                    {{ $data->status_vaksin === 'Sudah Vaksin' ? 'selected' : '' }}>Sudah Vaksin</option>
                                <option value="Belum Vaksin"
                                    {{ $data->status_vaksin === 'Belum Vaksin' ? 'selected' : '' }}>Belum Vaksin</option>
                            </select>
                        </div>
                        <div class="mb-3 mx-2 w-50">
                            <label for="surat_akte_lahir" class="form-label">Surat Akte Lahir <small>(.pdf)</small></label>
                            <input type="file" class="form-control" name="surat_akte_lahir" id="surat_akte_lahir"
                                accept=".pdf">
                        </div>
                    </div>

                    {{-- Data Baptis --}}
                    <div class="mt-3">
                        <h5 class="mb-3 fw-semibold">Data Baptis Jemaat</h5>
                    </div>
                    @if ($data->baptis)
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-100">
                                <label for="tanggal_baptis" class="form-label">Tanggal Baptis</label>
                                <input type="date" class="form-control" name="tanggal_baptis"
                                    value="{{ $data->baptis->tanggal_baptis }}" id="tanggal_baptis"
                                    placeholder="Masukkan Tanggal Baptis">
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-100">
                                <label for="tanggal_baptis" class="form-label">Tanggal Baptis</label>
                                <input type="date" class="form-control" name="tanggal_baptis" id="tanggal_baptis"
                                    placeholder="Masukkan Tanggal Baptis">
                            </div>
                        </div>
                    @endif

                    {{-- Data Sidi --}}
                    <div class="mt-3">
                        <h5 class="mb-4 fw-semibold">Data Sidi Jemaat</h5>
                    </div>

                    <div class="d-flex justify-content-around">
                        @if ($data->sidi)
                            <div class="mb-3 mx-2 w-50">
                                <label for="tanggal_sidi" class="form-label">Tanggal Sidi</label>
                                <input type="date" class="form-control" name="tanggal_sidi"
                                    value="{{ $data->sidi->tanggal_sidi }}" id="tanggal_sidi"
                                    placeholder="Masukkan Tanggal Sidi">
                            </div>
                        @else
                            <div class="mb-3 mx-2 w-50">
                                <label for="tanggal_sidi" class="form-label">Tanggal Sidi</label>
                                <input type="date" class="form-control" name="tanggal_sidi" id="tanggal_sidi"
                                    placeholder="Masukkan Tanggal Sidi">
                            </div>
                        @endif
                        <div class="mb-3 mx-2 w-50">
                            <label for="surat_baptis" class="form-label">Surat Baptis <small>(.pdf)</small></label>
                            <input type="file" class="form-control" name="surat_baptis" id="surat_baptis"
                                accept=".pdf">
                        </div>
                    </div>

                    {{-- Data Menikah --}}
                    <div class="mt-3">
                        <h5 class="mb-4 fw-semibold">Data Menikah Jemaat</h5>
                    </div>
                    @if ($data->menikah)
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-50">
                                <label for="nama_pasangan" class="form-label">Nama Lengkap Pasangan</label>
                                <input type="text" class="form-control" name="nama_pasangan" value="{{ $data->menikah->nama_pasangan }}" id="nama_pasangan"
                                    placeholder="Masukkan Nama Lengkap Pasangan">
                            </div>
                            <div class="mb-3 mx-2 w-50">
                                <label for="tempat_lahir_pasangan" class="form-label">Tempat Lahir Pasangan</label>
                                <input type="text" class="form-control" name="tempat_lahir_pasangan" value="{{ $data->menikah->tempat_lahir_pasangan }}"
                                    id="tempat_lahir_pasangan" placeholder="Masukkan Tempat Lahir Pasangan">
                            </div>
                            <div class="mb-3 mx-2 w-50">
                                <label for="tanggal_lahir_pasangan" class="form-label">Tanggal Lahir Pasangan</label>
                                <input type="date" class="form-control" name="tanggal_lahir_pasangan" value="{{ $data->menikah->tanggal_lahir_pasangan }}"
                                    id="tanggal_lahir_pasangan" placeholder="Masukkan Tanggal Lahir Pasangan">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-50">
                                <label for="nama_ayah_pasangan" class="form-label">Nama Ayah Pasangan</label>
                                <input type="text" class="form-control" name="nama_ayah_pasangan" value="{{ $data->menikah->nama_ayah_pasangan }}"
                                    id="nama_ayah_pasangan" placeholder="Masukkan Nama Ayah Pasangan">
                            </div>
                            <div class="mb-3 mx-2 w-50">
                                <label for="nama_ibu_pasangan" class="form-label">Nama Ibu Pasangan</label>
                                <input type="text" class="form-control" name="nama_ibu_pasangan" value="{{ $data->menikah->nama_ibu_pasangan }}"
                                    id="nama_ibu_pasangan" placeholder="Masukkan Nama Ibu Pasangan">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-50">
                                <label for="surat_baptis_pasangan" class="form-label">Surat Baptis Pasangan
                                    <small>(.pdf)</small></label>
                                <input type="file" class="form-control" name="surat_baptis_pasangan"
                                    id="surat_baptis_pasangan" accept=".pdf">
                            </div>
                            <div class="mb-3 mx-2 w-50">
                                <label for="surat_sidi_pasangan" class="form-label">Surat Sidi Pasangan
                                    <small>(.pdf)</small></label>
                                <input type="file" class="form-control" name="surat_sidi_pasangan"
                                    id="surat_sidi_pasangan" accept=".pdf">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-100">
                                <label for="tanggal_pernikahan" class="form-label">Tanggal Pernikahan</label>
                                <input type="date" class="form-control" name="tanggal_pernikahan" value="{{ $data->menikah->tanggal_pernikahan }}"
                                    id="tanggal_pernikahan" placeholder="Masukkan Tanggal Pernikahan">
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-50">
                                <label for="nama_pasangan" class="form-label">Nama Lengkap Pasangan</label>
                                <input type="text" class="form-control" name="nama_pasangan" id="nama_pasangan"
                                    placeholder="Masukkan Nama Lengkap Pasangan">
                            </div>
                            <div class="mb-3 mx-2 w-50">
                                <label for="tempat_lahir_pasangan" class="form-label">Tempat Lahir Pasangan</label>
                                <input type="text" class="form-control" name="tempat_lahir_pasangan"
                                    id="tempat_lahir_pasangan" placeholder="Masukkan Tempat Lahir Pasangan">
                            </div>
                            <div class="mb-3 mx-2 w-50">
                                <label for="tanggal_lahir_pasangan" class="form-label">Tanggal Lahir Pasangan</label>
                                <input type="date" class="form-control" name="tanggal_lahir_pasangan"
                                    id="tanggal_lahir_pasangan" placeholder="Masukkan Tanggal Lahir Pasangan">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-50">
                                <label for="nama_ayah_pasangan" class="form-label">Nama Ayah Pasangan</label>
                                <input type="text" class="form-control" name="nama_ayah_pasangan"
                                    id="nama_ayah_pasangan" placeholder="Masukkan Nama Ayah Pasangan">
                            </div>
                            <div class="mb-3 mx-2 w-50">
                                <label for="nama_ibu_pasangan" class="form-label">Nama Ibu Pasangan</label>
                                <input type="text" class="form-control" name="nama_ibu_pasangan"
                                    id="nama_ibu_pasangan" placeholder="Masukkan Nama Ibu Pasangan">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-50">
                                <label for="surat_baptis_pasangan" class="form-label">Surat Baptis Pasangan
                                    <small>(.pdf)</small></label>
                                <input type="file" class="form-control" name="surat_baptis_pasangan"
                                    id="surat_baptis_pasangan" accept=".pdf">
                            </div>
                            <div class="mb-3 mx-2 w-50">
                                <label for="surat_sidi_pasangan" class="form-label">Surat Sidi Pasangan
                                    <small>(.pdf)</small></label>
                                <input type="file" class="form-control" name="surat_sidi_pasangan"
                                    id="surat_sidi_pasangan" accept=".pdf">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="mb-3 mx-2 w-100">
                                <label for="tanggal_pernikahan" class="form-label">Tanggal Pernikahan</label>
                                <input type="date" class="form-control" name="tanggal_pernikahan"
                                    id="tanggal_pernikahan" placeholder="Masukkan Tanggal Pernikahan">
                            </div>
                        </div>
                    @endif

                    {{-- Tambah Akun --}}
                    <div class="mt-3">
                        <h5 class="mb-4 fw-semibold">Tambah Akun</h5>
                    </div>

                    <div class="mb-3 mx-2 w-100">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $data->user->username }}" id="username"
                            placeholder="Masukkan Username">
                    </div>
                    <div class="mb-3 mx-2 w-100">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
