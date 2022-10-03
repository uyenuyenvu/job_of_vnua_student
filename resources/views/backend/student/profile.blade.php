@extends('backend.layouts.master-student')
@section('title')
    Hồ sơ sinh viên
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#fileupload').change(function () {
                $('#text-input').text(this.files.length + " tệp đã được chọn");
            });
        });

        $('#btnCvSubmit').click(function () {
            $('#formExcel').submit();
        })
    </script>
@endsection

@section('contents')
    <div class="wrapper">
        <!-- .page -->
        <div class="page">
            <!-- .page-cover -->
            <header class="page-cover">
                <div class="text-center">
                    <a href="user-profile.html" class="user-avatar user-avatar-xl"><img
                            src="{{ asset('backend') }}/assets/images/avatars/profile.jpg" alt=""></a>
                    <h2 class="h4 mt-2 mb-0"> {{Auth::guard('student')->user()->name}} </h2>
                    <p class="text-muted"> Sinh Viên </p>
                </div><!-- .cover-controls -->
            </header><!-- /.page-cover -->
            <!-- .page-navs -->
            <!-- .page-inner -->
            <div class="page-inner">
                <!-- .page-title-bar -->
                <header class="page-title-bar">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="user-profile.html"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Overview</a>
                            </li>
                        </ol>
                    </nav>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- grid row -->
                    <div class="row">
                        <!-- grid column -->
                        <div class="col-lg-4">
                            <!-- .card -->
                            <div class="card card-fluid">
                                <h6 class="card-header"> CV sinh viên </h6><!-- .nav -->
                                <div class="card-body">
                                    <div id="dropzone" class="fileinput-dropzone">
                                        <form action="{{route('students.upload')}}" id="formExcel" method="post"
                                              enctype='multipart/form-data'>
                                            @csrf
                                            <span id="text-input">Thả hoặc kích để tải lên cv.</span>
                                            <!-- The file input field used as target for the file upload widget -->
                                            <input id="fileupload" type="file" name="file" multiple>
                                        </form>
                                    </div>
                                    <div style="text-align: right; width: 100%; margin-top: 10px">
                                        <button class="btn btn-success" id="btnCvSubmit"><i class="fa fa-upload"></i>
                                            Tải lên
                                        </button>
                                    </div>
{{--                                    @if(Auth::guard('student')->user()->curriculum_vitae)--}}
{{--                                        <div>--}}
{{--                                            <a href="">Xem cv của bạn đã tải lên</a>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
                                </div>
                            </div><!-- /.card -->
                        </div><!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-lg-8">
                            <!-- .card -->
                            <div class="card card-fluid">
                                <h6 class="card-header"> Thông tin sinh viên </h6><!-- .card-body -->
                                <div class="card-body">
                                    <!-- .media -->
                                    <div class="media mb-3">
                                        <!-- avatar -->
                                        <div class="user-avatar user-avatar-xl fileinput-button">
                                            <div class="fileinput-button-label"> Change photo</div>
                                            <img src="{{ asset('backend') }}/assets/images/avatars/profile.jpg" alt="">
                                            <input id="fileupload-avatar" type="file" name="avatar">
                                        </div><!-- /avatar -->
                                        <!-- .media-body -->
                                        <div class="media-body pl-3">
                                            <h3 class="card-title"> Ảnh đại diện </h3>
                                            <h6 class="card-subtitle text-muted"> Click the current avatar to change
                                                your photo. </h6>
                                            <p class="card-text">
                                                <small>JPG, GIF or PNG 400x400, &lt; 2 MB.</small>
                                            </p><!-- The avatar upload progress bar -->
                                            <div id="progress-avatar" class="progress progress-xs fade">
                                                <div
                                                    class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                    role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div><!-- /avatar upload progress bar -->
                                        </div><!-- /.media-body -->
                                    </div><!-- /.media -->
                                    <!-- form -->
                                    <form method="post">
                                        <!-- form row -->
                                        <div class="form-row">
                                            <!-- form column -->
                                            <label for="input01" class="col-md-3">Họ và tên</label><!-- /form column -->
                                            <!-- form column -->
                                            <div class="col-md-9 mb-3">
                                                <input type="text" class="form-control" id="input01"
                                                       value="{{Auth::guard('student')->user()->name}}">
                                            </div><!-- /form column -->
                                        </div><!-- /form row -->

                                        <div class="form-row">
                                            <!-- form column -->
                                            <label for="input01" class="col-md-3">Mã Sinh viên</label>
                                            <!-- /form column -->
                                            <!-- form column -->
                                            <div class="col-md-9 mb-3">
                                                <input type="text" class="form-control" id="input01"
                                                       value="{{Auth::guard('student')->user()->student_code}}">
                                            </div><!-- /form column -->
                                        </div><!-- /form row -->

                                        <!-- form row -->
                                        <!-- form row -->
                                        <div class="form-row">
                                            <!-- form column -->
                                            <label for="input02" class="col-md-3">Email</label> <!-- /form column -->
                                            <!-- form column -->
                                            <div class="col-md-9 mb-3">
                                                <input type="text" class="form-control" id="input02"
                                                       value="{{Auth::guard('student')->user()->email}}">
                                            </div><!-- /form column -->
                                        </div><!-- /form row -->
                                        <!-- form row -->

                                        <!-- form row -->
                                        <div class="form-row">
                                            <!-- form column -->
                                            <label for="input03" class="col-md-3">Số điện thoại</label>
                                            <!-- /form column -->
                                            <!-- form column -->
                                            <div class="col-md-9 mb-3">
                                                <input type="text" class="form-control" id="input03"
                                                       value="{{Auth::guard('student')->user()->phone}}">
                                            </div><!-- /form column -->
                                        </div><!-- /form row -->
                                        <!-- form row -->
                                        <hr>
                                        <!-- .form-actions -->
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary ml-auto">Cập nhật thông tin
                                            </button>
                                        </div><!-- /.form-actions -->
                                    </form><!-- /form -->
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                            <!-- .card -->
                        </div><!-- /grid column -->
                    </div><!-- /grid row -->
                </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
        </div><!-- /.page -->
    </div><!-- .app-footer -->
@endsection
