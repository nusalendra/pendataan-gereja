
            <div class="container my-auto mt-8">
                <div class="row signin-margin">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">HKBP Purbasari</h4>
                                    <div class="row mt-3">
                                        <h6 class='text-white text-center'>
                                            <span>Halaman Login</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form wire:submit='store'>
                                    @if (Session::has('status'))
                                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('status') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="input-group input-group-outline mt-3 @if(strlen($username ?? '') > 0) is-filled @endif">
                                        <label class="form-label">Username</label>
                                        <input wire:model.live="username" type="text" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mt-3 @if(strlen($password ?? '') > 0) is-filled @endif">
                                        <label class="form-label">Password</label>
                                        <input wire:model.live="password" type="password" class="form-control"
                                             >
                                    </div>
                                    @error('message')
                                    <div class="text-center mt-3">
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    </div>
                                    @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>