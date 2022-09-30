@include('head')

<body>
    <?php
    $user = session()->get('user', '');
    ?>
    @include('user.header')
    <div class="container_4 row col-12 m-auto">
        <div class="row m-auto col-11 pt-5">
            <div class="row col-3">
                <div class="col-3">
                    <img src="/storage/images/user/{{ $user->avatar }}" alt="" class="account_avatar rounded-circle" height="50px">
                </div>
                <div class="col-9">
                    <div>Tài khoản của:</div>
                    <p>{{$user->name}}</p>
                </div>
            </div>
            <div class="col-9 px-5" style="font-size: 22px;">
                <p>Thông tin tài khoản</p>
            </div>
            <div class="col-3 bg-bg-secondary">
                <a href="/user/notification" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-bell text-secondary"></i>
                    <span class="px-2">Thông báo của tôi</span>
                </a>
                <a href="/user/account" class="m_item col-12 btn btn-link text-dark px-3" style=" background-color: #dcdcdc; text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-user"></i>
                    <span class="px-2">Thông tin tài khoản</span>
                </a>
                <a href="/user/like" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-heart"></i>
                    <span class="px-2">Tours yêu thích</span>
                </a>
                <a href="/user/order" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-scroll-torah"></i>
                    <span class="px-2">Tours đã đặt</span>
                </a>
                <a href="{{ route('logout') }}" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="px-2">Đăng xuất</span>
                </a>
            </div>
            <div class="main_container col-9 bg-white p-4 mb-5" style="height: 72vh; overflow-y: scroll;">
                <div class="row m-auto">
                    <form action="" class="row col-7 border-end border-secondary" id="account_edit_form" method="POST" data-url="{{ route('account.update',$user->id) }}">
                        <div class="row my-2" style="font-size: 20px;">Thông tin cá nhân:</div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-3">
                            <img src="/storage/images/user/{{ $user->avatar }}" alt="" class="account_avatar rounded-circle" height="100px">
                        </div>
                        <div class="col-9 mb-2">
                            <div class="row my-2">
                                <div class="col-3 d-flex" style="align-items: center;">
                                    Họ và tên:
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="name_edit" id="name_edit" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-3 d-flex" style="align-items: center;">
                                    Ảnh đại diện:
                                </div>
                                <div class="col-9">
                                    <input type="file" class="form-control" name="avatar_edit" id="avatar_edit" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex my-2">
                            <div class="col-3 d-flex" style="align-items: center;">
                                Ngày sinh:
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control" name="dateofbirth_edit" id="dateofbirth_edit" value="{{ $user->dateofbirth }}">
                            </div>
                        </div>
                        <div class="col-12 d-flex my-2">
                            <div class="col-3 d-flex" style="align-items: center;">
                                Giới tính:
                            </div>
                            <div class="col-9">
                                <select class="form-select" id="sex_edit" name="sex_edit" value="{{ $user->sex }}">
                                    <option value="" disabled>Giới tính</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 d-flex my-2">
                            <div class="col-3 d-flex" style="align-items: center;">
                                Địa chỉ:
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="address_edit" id="address_edit" value="{{ $user->address }}">
                            </div>
                        </div>
                        <div class="col-12 d-flex my-2">
                            <div class="col-3 d-flex" style="align-items: center;">
                                Quốc tịch:
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="nation_name_edit" id="nation_name_edit" value="{{ $user->nation_name }}">
                            </div>
                        </div>
                        <div class="col-12 d-flex my-4">
                            <div class="col-3 d-flex" style="align-items: center;">
                            </div>
                            <div class="col-9">
                                <input type="hidden" id="avt_edit" name="avt_edit" value="{{ $user->avatar }}">
                                <button type="submit" class="col-4 btn btn-primary" id="user_edit_btn" value="edit">Lưu thay đổi</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-5 ps-5">
                        <div class="row my-2" style="font-size: 20px;">Số điện thoại và email:</div>
                        <div class="row my-2" style="font-size: 15px;">
                            <div class="col-2 d-flex" style="align-items: center;">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="col-5">
                                <div>Số điện thoại</div>
                                <div style="font-size: 10px;">{{$user->phone_number }}</div>
                            </div>
                            <div class="col-5">
                                <button type="submit" style="font-size: 15px;" class="col-12 btn btn-outline-success" id="user_show_edit_phone_number_btn" value="edit">Cập nhập</button>
                            </div>
                        </div>
                        <div class="row my-2" style="font-size: 15px;">
                            <div class="col-2 d-flex" style="align-items: center;">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="col-5">
                                <div>Email</div>
                                <div style="font-size: 10px;">{{$user->email }}</div>
                            </div>
                            <div class="col-5">
                                <button type="submit" style="font-size: 15px;" class="col-12 btn btn-outline-success" id="user_show_edit_email_btn" value="edit">Cập nhập</button>
                            </div>
                        </div>
                        <div class="row my-2 pt-3" style="font-size: 20px;">Bảo mật:</div>
                        <div class="row my-2" style="font-size: 15px;">
                            <div class="col-2 d-flex" style="align-items: center;">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <div class="col-5 d-flex" style="align-items: center;">
                                Đổi mật khẩu
                            </div>
                            <div class="col-5">
                                <button type="submit" style="font-size: 15px;" class="col-12 btn btn-outline-success" id="account_show_edit_password_btn" value="edit">Cập nhập</button>
                            </div>
                            <div class="modal fade" id="account_edit_password_formModal" aria-hidden="true" style="margin-top: 20vh;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" class="form-horizontal" id="account_edit_password_form" method="POST" data-url="{{ route('account.update',$user->id) }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="modal-header">
                                                <div class="m-auto" style="font-size: 20px;">Đổi mật khẩu</div>
                                            </div>
                                            <div class="modal-body text-dark">
                                                <div class="form-group">
                                                    <label>Mật khẩu hiện tại:</label>
                                                    <input type="password" class="form-control" id="old_password_edit" name="old_password_edit" placeholder="Nhập mật khẩu hiện tại" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mật khẩu mới:</label>
                                                    <input type="password" class="form-control" id="new_password_edit" name="new_password_edit" placeholder="Nhập mật khẩu hiện tại" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nhập lại mật khẩu mới:</label>
                                                    <input type="password" class="form-control" id="again_new_password_edit" name="again_new_password_edit" placeholder="Nhập mật khẩu hiện tại" value="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" id="old_password_dc" name="old_password_dc" value="{{ $user->password }}">
                                                <button type="submit" class="col-5 btn btn-primary" id="account_edit_password_btn" value="edit">Gửi tin</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2 pt-3" style="font-size: 20px;">Liên kết mạng xã hội:</div>
                        <div class="row my-2" style="font-size: 15px;">
                            <div class="col-2 d-flex" style="align-items: center;">
                                <i class="fa-brands fa-facebook text-primary"></i>
                            </div>
                            <div class="col-5 d-flex" style="align-items: center;">
                                Facebook
                            </div>
                            <div class="col-5">
                                <button type="submit" style="font-size: 15px;" class="col-12 btn btn-outline-success" id="" value="">Liên kết</button>
                            </div>
                        </div>
                        <div class="row my-2" style="font-size: 15px;">
                            <div class="col-2 d-flex" style="align-items: center;">
                                <i class="fa-brands fa-google-plus-g text-danger"></i>
                            </div>
                            <div class="col-5 d-flex" style="align-items: center;">
                                Google +
                            </div>
                            <div class="col-5">
                                <button type="submit" style="font-size: 15px;" class="col-12 btn btn-outline-success" id="" value="">Liên kết</button>
                            </div>
                        </div>
                        <div class="row my-2" style="font-size: 15px;">
                            <div class="col-2 d-flex" style="align-items: center;">
                                <i class="fa-brands fa-linkedin text-primary"></i>
                            </div>
                            <div class="col-5 d-flex" style="align-items: center;">
                                Linkedin
                            </div>
                            <div class="col-5">
                                <button type="submit" style="font-size: 15px;" class="col-12 btn btn-outline-success" id="" value="">Liên kết</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>
@include('footer')
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>
</html>