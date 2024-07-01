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
                                    <h5 class="mb-3 fw-bold">Pendaftaran Menikah</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="fw-semibold">Identitas Anda</h5>
                        </div>
                        <form action="/pendaftaran-baptis" id="pendaftaranBaptis" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $data->id }}" name="jemaat_id">
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
                                        <label class="form-label">Nama Ayah</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->nama_ayah }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->nama_ibu }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $data->nama_ibu }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tentukan Tanggal Baptis</label>
                                        <input type="date" name="tanggal_baptis" class="form-control border border-2 p-2"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary p-2">Kirim Pendaftaran</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('pendaftaranBaptis').addEventListener('submit', function(event) {
            event.preventDefault();

            var jemaat_id = document.querySelector('input[name="jemaat_id"]').value;

            fetch('/cek-status-baptis', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        jemaat_id: jemaat_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'Sudah Baptis') {
                        Swal.fire({
                            title: 'Gagal Mendaftar',
                            text: 'Anda sudah dibaptis. Pendaftaran ulang tidak bisa dilakukan.',
                            icon: 'error'
                        });
                    } else if (data.status === 'Mendaftar') {
                        Swal.fire({
                            title: 'Gagal Mendaftar',
                            text: 'Pendaftaran Anda sedang menunggu konfirmasi. Anda tidak dapat mendaftar lagi saat ini.',
                            icon: 'warning'
                        });
                    } else if (data.status === 'Dikonfirmasi') {
                        Swal.fire({
                            title: 'Gagal Mendaftar',
                            text: 'Pendaftaran baptis anda telah dikonfirmasi. Silakan melaksanakan pada tanggal yang telah anda pilih.',
                            icon: 'warning'
                        });
                    } else {
                        Swal.fire({
                            title: 'Pendaftaran Baptis',
                            text: "Pilih Lanjutkan untuk mengirim pendaftaran Baptis",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Lanjutkan'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Pendaftaran Berhasil',
                                    text: 'Pendaftaran Baptis sudah dikirim. Silahkan untuk menunggu konfirmasi',
                                    icon: 'success'
                                }).then(() => {
                                    event.target.submit();
                                });
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
    <script>
        document.getElementById('pendaftaranBaptis').addEventListener('submit', function(event) {
            event.preventDefault();


        });
    </script>
@endsection
