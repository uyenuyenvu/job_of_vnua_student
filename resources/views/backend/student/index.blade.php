@extends('backend.layouts.master')
@section('scripts')
    <script src="{{asset('backend/custom/student.js')}}"></script>
@endsection
@section('css')
    <style>
        .error{
            color: red;
        }
        #excelForm{
            position: relative;
            width: 100%;
            height: 200px;
            border: 4px dashed #777777;
            margin-bottom: 50px;
        }
        #excelForm p{
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 170px;
            color: #777777;
            font-family: Arial;
        }
        #excelForm input{
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
        }
        #excelForm button{
            margin: 0;
            color: #fff;
            background: #16a085;
            border: none;
            width: 100px;
            height: 35px;
            margin-top: -20px;
            margin-left: -4px;
            border-radius: 4px;
            border-bottom: 4px solid #117A60;
            transition: all .2s ease;
            outline: none;
        }
        #excelForm button:hover{
            background: #149174;
            color: #0C5645;
        }
        #excelForm button:active{
            border:0;
        }

    </style>
@endsection

@section('contents')
    <div class="wrapper">
        <!-- .page -->
        <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <!-- .page-title-bar -->
                <header class="page-title-bar">
                    <!-- .breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Tables</a>
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title -->
                    <h1 class="page-title"> Quản lý người dùng </h1>

                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <div class="card-header">
                            <div>
                                <button class="btn btn-success" id="btnAddStudent">
                                    <i class="fa fa-plus"> </i> Thêm mới</a>
                                </button>

                                <button class="btn btn-primary" id="btnAddStudentExcel">
                                    <i class="fas fa-file-upload"></i> Nhập Excel
                                </button>
                            </div>
                        </div>
                        <!-- .card-body -->
                        <div class="card-body">
                            <!-- .table -->
                            <div id="dt-responsive_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="table-responsive">
                                    <table id="studentTable"
                                           class="table dt-responsive nowrap w-100 dataTable dtr-inline" role="grid"
                                           aria-describedby="dt-responsive_info">
                                        <thead>
                                        <tr role="row">
                                            <th>STT</th>
                                            <th>Họ và tên</th>
                                            <th>Mã sinh viên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Quê quán</th>
                                            <th>Lớp</th>
                                            <th>Khoa</th>
                                            <th>Trạng thái việc làm</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        </tfoot>
                                        <tbody>
                                        <tr class="odd">
                                            <td valign="top" colspan="6" class="dataTables_empty">Loading...</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.table -->
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
        </div><!-- /.page -->
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formAddStudent">
                        <!-- .fieldset -->
                        <fieldset>
                            <div class="form-group">
                                <label for="email">Email</label> <input type="email" class="form-control" id="email" name="email" aria-describedby="tf1Help" placeholder="Nhập vào email">
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập vào họ tên">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="student_code">Mã sinh viên</label>
                                <input type="text" class="form-control" id="student_code" name="student_code" placeholder="Nhập vào mã sinh viên">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone"  placeholder="Nhập vào số điện thoại">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="home_town">Quê quán</label>
                                <input type="text" class="form-control" id="home_town" name="home_town"  placeholder="Nhập vào quên quán">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="class">Lớp</label>
                                <input type="text" class="form-control" id="class" name="class"  placeholder="Nhập vào lớp">
                            </div><!-- /.form-group -->


                            <div class="form-group">
                                <label for="facuty_id">Chọn khoa</label>
                                <select name="facuty_id" id="facuty_id" class="form-control">
                                    <option value=""></option>
                                    @forelse($faculties as $faculty)
                                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>

                        </fieldset><!-- /.fieldset -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btnSubmitFormStudent">Tạo mới</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cập nhật</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditStudent">
                        <!-- .fieldset -->
                        <fieldset>
                            <div class="form-group">
                                <label for="edit_email">Email</label> <input type="email" class="form-control" id="edit_email" name="email" aria-describedby="tf1Help" placeholder="Nhập vào email">
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label for="edit_name">Họ và tên</label>
                                <input type="text" class="form-control" id="edit_name" name="name" placeholder="Nhập vào họ tên">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="edit_student_code">Mã sinh viên</label>
                                <input type="text" class="form-control" id="edit_student_code" name="student_code" placeholder="Nhập vào chức vụ">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="edit_phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="edit_phone" name="phone"  placeholder="Nhập vào số điện thoại">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="edit_home_town">Quê quán</label>
                                <input type="text" class="form-control" id="edit_home_town" name="home_town"  placeholder="Nhập vào số điện thoại">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="edit_class">Lớp</label>
                                <input type="text" class="form-control" id="edit_class" name="class"  placeholder="Nhập vào số điện thoại">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="edit_facuty_id">Chọn công ti</label>
                                <select name="facuty_id" id="edit_facuty_id" class="form-control">
                                    <option value=""></option>
                                    @forelse($faculties as $faculty)
                                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>


                        </fieldset><!-- /.fieldset -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btnEditFormStudent">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="excelStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cập nhật</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        Vui lòng tải lên tệp theo mẫu: <span><a href="{{route('admin.student.download')}}"><i class="fas fa-file-download"></i> tệp mẫu</a></span>
                    </div>
                    <form id="excelForm">
                        <input type="file" id="excel" name="excel" multiple>
                        <p>Thả hoặc kích vào để chọn tệp tải lên.</p>
                        <div style="width: 100%; text-align: center">
                            <button type="button" id="btnImportStudent"><i class="fas fa-upload"></i> Tải lên</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
