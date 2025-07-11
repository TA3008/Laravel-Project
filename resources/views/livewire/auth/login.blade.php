
    
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex"
            style="background-image: url('/assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="/assets/images/logo/logo.png">
                                        <h2 class="m-b-0">Sign In</h2>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif

                                    <form wire:submit.prevent="login">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" id="email"
                                                    placeholder="Email" wire:model.defer="email">
                                            </div>
                                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            <a class="float-right font-size-13 text-muted" href="#">Forget Password?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="Password" wire:model.defer="password">
                                            </div>
                                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>

                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">
                                                Don't have an account?
                                                <a class="small" href="{{ route('register') }}">Signup</a>
                                            </span>
                                            <button type="submit" class="btn btn-primary">Sign In</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2019 ThemeNate</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="#">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="#">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


