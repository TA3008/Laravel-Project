<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Enlink - Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">

    <!-- Page CSS -->
    <link href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- Core CSS -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            @include('layouts.header')  
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('layouts.sideNav')
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content">
                    @yield('content')
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                @include('layouts.footer')
                <!-- Footer END -->
            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>

                            <div class="m-t-30">
                                <h5 class="m-b-20">Files</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-file-excel"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="#" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                        <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-30">
                                <h5 class="m-b-20">Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="{{ asset('assets/images/avatars/thumb-1.jpg') }}" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="#" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                        <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="{{ asset('assets/images/avatars/thumb-2.jpg') }}" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="#" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                        <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-30">
                                <h5 class="m-b-20">News</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="{{ asset('assets/images/others/img-1.jpg') }}" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="#" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">25 Nov 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Theme Config</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="m-b-30">
                                <h5 class="m-b-0">Header Color</h5>
                                <p>Config header background color</p>
                                <div class="theme-configurator d-flex m-t-10">
                                    @foreach(['default', 'primary', 'success', 'secondary', 'danger'] as $theme)
                                        <div class="radio">
                                            <input id="header-{{ $theme }}" name="header-theme" type="radio" value="{{ $theme }}" {{ $loop->first ? 'checked' : '' }}>
                                            <label for="header-{{ $theme }}"></label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Side Nav Dark</h5>
                                <p>Change Side Nav to dark</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                    <label for="side-nav-theme-toogle"></label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Folded Menu</h5>
                                <p>Toggle Folded Menu</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                    <label for="side-nav-fold-toogle"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            <!-- Quick View END -->
        </div>
    </div>

    <!-- Core Vendors JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-e-commerce.js') }}"></script>

    <!-- Core JS -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- Livewire Scripts -->
    @livewireScripts
    @stack('scripts')

    <!-- TinyMCE JS -->
<script src="https://cdn.tiny.cloud/1/q067kmptog56kbxw1h86mc871k4f3ytfic0ss5aljlu5ueea/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    window.initTinyMCE = function () {
        const textarea = document.querySelector('#content-editor');

        if (!textarea) {
            console.warn('⚠️ Không tìm thấy textarea');
            return;
        }

        if (tinymce.get('content-editor')) {
            console.log('⏩ TinyMCE đã tồn tại');
            return;
        }

        console.log('✅ TinyMCE initializing');

        tinymce.init({
            target: textarea,
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            setup(editor) {
                const updateLivewireContent = () => {
                    const componentRoot = textarea.closest('[wire\\:id]');
                    const componentId = componentRoot?.getAttribute('wire:id');

                    if (window.Livewire && componentId) {
                        const content = editor.getContent();
                        const livewireComponent = Livewire.find(componentId);

                        if (livewireComponent) {
                            console.log('🔁 Đẩy nội dung về Livewire:', content);
                            livewireComponent.set('content', content);
                        }
                    }
                };

                editor.on('Change', updateLivewireContent);
                editor.on('KeyUp', updateLivewireContent);
                editor.on('init', () => {
                    console.log('✅ TinyMCE init hoàn tất');
                    updateLivewireContent();
                });
            }
        });
    };
</script>



</body>

</html>
