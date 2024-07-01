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
                        <form action="/pendaftaran-menikah" id="pendaftaranMenikah" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $data->id }}" name="jemaat_id">
                            <div class="card-body p-3">
                                <div class="ms-1">
                                    @if ($data->menikah && $data->menikah->status_menikah == 'Mendaftar')
                                        <p class="fw-normal text-danger">Anda telah melakukan pendaftaran menikah</p>
                                    @elseif ($data->menikah && $data->menikah->status_menikah == 'Dikonfirmasi')
                                        <p class="fw-normal text-danger">Pendaftaran menikah anda telah dikonfirmasi.
                                            Silahkan melaksanakan pernikahan pada tanggal
                                            {{ \Carbon\Carbon::parse($data->menikah->tanggal_menikah)->translatedFormat('d F Y') }}
                                        </p>
                                    @elseif($data->menikah && $data->menikah->status_menikah == 'Sudah Menikah')
                                        <p class="fw-normal text-primary">Anda telah menikah sebelumnya, sehingga tidak
                                            dapat melakukan pendaftaran menikah lagi.</p>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap Pasangan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="Masukkan Nama Lengkap Pasangan" name="nama_pasangan" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis Kelamin Pasangan <span
                                                class="text-danger">*</span></label>
                                        <select name="jenis_kelamin_pasangan" class="form-select"
                                            aria-label="Default select example" required>
                                            <option selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tempat Lahir Pasangan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="Masukkan Tempat Lahir Pasangan" name="tempat_lahir_pasangan"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Lahir Pasangan <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control border border-2 p-2"
                                            placeholder="Masukkan Tanggal Lahir Pasangan" name="tanggal_lahir_pasangan"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ayah Pasangan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="Masukkan Nama Ayah Pasangan" name="nama_ayah_pasangan" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ibu Pasangan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="Masukkan Nama Ibu Pasangan" name="nama_ibu_pasangan" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Upload Surat Baptis Pasangan <small>(.pdf)</small></label>
                                        <input type="file" name="surat_baptis_pasangan" class="form-control p-2"
                                            accept=".pdf" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Upload Surat Sidi Pasangan <small>(.pdf)</small></label>
                                        <input type="file" name="surat_sidi_pasangan" class="form-control p-2"
                                            accept=".pdf" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Tanggal Pernikahan <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control border border-2 p-2"
                                            placeholder="Masukkan Tanggal Pernikahan" name="tanggal_pernikahan" required>
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
        document.getElementById('pendaftaranMenikah').addEventListener('submit', function(event) {
            event.preventDefault();

            var jemaat_id = document.querySelector('input[name="jemaat_id"]').value;

            // Lakukan AJAX request untuk mengecek status menikah
            fetch('/cek-status-menikah', {
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
                    if (data.status === 'Sudah Menikah') {
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Anda sudah menikah, sehingga tidak dapat melakukan pendaftaran lagi.',
                            icon: 'error'
                        });
                    } else if (data.status === 'Mendaftar') {
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Pendaftaran anda sedang menunggu konfirmasi. Anda tidak dapat mendaftar lagi saat ini.',
                            icon: 'warning'
                        });
                    } else if (data.status === 'Dikonfirmasi') {
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Pendaftaran menikah anda telah dikonfirmasi. Silakan melaksanakan pada tanggal yang telah anda pilih.',
                            icon: 'warning'
                        });
                    } else {
                        Swal.fire({
                            title: 'Pendaftaran Menikah',
                            text: "Apakah identitas pasangan sudah benar?",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Lanjutkan'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Pendaftaran Berhasil',
                                    text: 'Pendaftaran Menikah sudah dikirim. Silahkan untuk menunggu konfirmasi',
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
@endsection
