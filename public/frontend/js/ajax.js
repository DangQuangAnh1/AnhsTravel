$(document).ready(function ($) {

    $("#btn-add").click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });

    $('#myForm').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            sender: $('#sender').val(),
            receiver: $('#receiver').val(),
            title: $('#title').val(),
            description: $('#description').val()

        };
        var type = "POST";
        var ajaxurl = $(this).attr('data-url');
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('hide');
                toastr.success("Gửi tin nhắn thành công!");
            },
            error: function (data) {
                alert(data);
            }
        });
    });

    $('.delete_talk').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).attr('data-url');
        var _this = $(this);
        console.log(url);
        if (confirm('Ban co chac muon xoa khong?')) {
            $.ajax({
                type: 'delete',
                url: url,
                success: function (response) {
                    toastr.warning('Đã xóa thông báo.');
                    _this.parent().parent().remove();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            })
        }
    })
});

//order

$(document).ready(function ($) {

    $("#btn-add-order").click(function () {
        jQuery('#order_add_btn').val("add");
        jQuery('#order_add_form').trigger("reset");
        jQuery('#order_add_formModal').modal('show');
    });
    $('#order_add_form').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var orderData = {
            user_id: $('#user_id').val(),
            tour_id: $('#tour_id').val(),
            name: $('#name').val(),
            phone_number: $('#phone_number').val(),
            travel_date: $('#travel_date').val(),
            adults: $('#adults').val(),
            childrens: $('#childrens').val(),
            payment: $('#payment').val(),
            note: $('#note').val(),
            status: $('#status').val()
        };
        var type = "POST";
        var ajaxurl = $(this).attr('data-url');
        $.ajax({
            type: type,
            url: ajaxurl,
            data: orderData,
            dataType: 'json',
            success: function (data) {
                jQuery('#order_add_form').trigger("reset");
                jQuery('#order_add_formModal').modal('hide');
                toastr.success("Đặt tour thành công.");
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $('.delete_order').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).attr('data-url');
        var _this = $(this);
        if (confirm('Ban co chac muon xoa khong?')) {
            $.ajax({
                type: 'delete',
                url: url,
                success: function (response) {
                    toastr.warning('Đã xóa tour khỏi danh sách yêu thích');
                    _this.parent().parent().parent().remove();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            })
        }
    });


    $(".order_show_edit_btn").click(function () {
        var tour_id = $(this).val();
        jQuery('#order_edit_formModal_' + tour_id).modal('show');
        jQuery('#order_edit_form_' + tour_id).trigger("reset");
        $(document).ready(function ($) {
            $('#order_edit_form_' + tour_id).submit(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                console.log(tour_id);
                e.preventDefault();
                var orderData = {
                    name: $('#name_' + tour_id).val(),
                    phone_number: $('#phone_number_' + tour_id).val(),
                    travel_date: $('#travel_date_' + tour_id).val(),
                    adults: $('#adults_' + tour_id).val(),
                    childrens: $('#childrens_' + tour_id).val(),
                    payment: $('#payment_' + tour_id).val(),
                    note: $('#note_' + tour_id).val(),
                };
                var type = "PUT";
                var ajaxurl = $(this).attr('data-url');
                console.log(orderData);
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: orderData,
                    dataType: 'json',
                    success: function (data) {
                        toastr.success("Đặt lại tour thành công.");
                        jQuery('#order_edit_formModal_' + tour_id).modal('hide');
                        jQuery('#order_edit_form_' + tour_id).trigger("reset");
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    });

});

//like

$(document).ready(function ($) {
    $('#like_form').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var likeData = {
            user_id: $('#user_id').val(),
            tour_id: $('#tour_id').val(),
        };
        var type = "POST";
        var ajaxurl = $(this).attr('data-url');
        $.ajax({
            type: type,
            url: ajaxurl,
            data: likeData,
            dataType: 'json',
            success: function (data) {
                jQuery('#like_form').trigger("reset");
                toastr.success("Đã thêm tour vào danh sách yêu thích.");
                jQuery('#like_div').html("<button class='col-10 btn bg-danger text-white' id='delete_like'>Xóa khỏi danh sách yêu thích</button>");
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $('#delete_like').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).attr('data-url');
        if (confirm('Ban co chac muon xoa khong?')) {
            $.ajax({
                type: 'delete',
                url: url,
                success: function (response) {
                    toastr.warning('Đã xóa tour khỏi danh sách yêu thích');
                    jQuery('#like_div').html("<button type='submit' class='col-10 btn btn-primary' id='add_like'>Thêm vào danh sách yêu thích</button>");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            })
        }
    });

    $('.delete_like').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).attr('data-url');
        var _this = $(this);
        if (confirm('Ban co chac muon xoa khong?')) {
            $.ajax({
                type: 'delete',
                url: url,
                success: function (response) {
                    toastr.warning('Đã xóa tour khỏi danh sách yêu thích');
                    _this.parent().parent().remove();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            })
        }
    });

});

// account

$(document).ready(function ($) {

    $('#account_edit_form').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var userData = {
            name: $('#name_edit').val(),
            dateofbirth: $('#dateofbirth_edit').val(),
            sex: $('#sex_edit').val(),
            address: $('#address_edit').val(),
            nation_name: $('#nation_name_edit').val(),
            avatar: $('#avatar_edit').val().split('\\').pop()
        };
        if (userData.avatar == "") {
            userData.avatar = $('#avt_edit').val();
        }
        var type = "PUT";
        var ajaxurl = $(this).attr('data-url');
        $.ajax({
            type: type,
            url: ajaxurl,
            data: userData,
            dataType: 'json',
            success: function (data) {
                toastr.success("Đổi thông tin thành công.");
                $('#name_edit').val(data.name);
                $('#dateofbirth_edit').val(data.dateofbirth);
                $('#sex_edit').val(data.sex);
                $('#address_edit').val(data.address);
                $('#nation_name_edit').val(data.nation_name);
                $(".account_avatar").attr("src", "/storage/images/user/" + data.avatar);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $("#account_show_edit_password_btn").click(function () {
        jQuery('#account_edit_password_form').trigger("reset");
        jQuery('#account_edit_password_formModal').modal('show');
    });

    $('#account_edit_password_form').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var passwordData = {
            old_password: $('#old_password_edit').val(),
            old_password_dc: $('#old_password_dc').val(),
            password: $('#new_password_edit').val(),
            again_new_password: $('#again_new_password_edit').val()
        };
        if (passwordData.old_password != passwordData.old_password_dc || passwordData.password != passwordData.again_new_password) {
            toastr.warning("Vui lòng nhập đúng thông tin.");
            jQuery('#account_edit_password_form').trigger("reset");
        }
        else {
            var type = "PUT";
            var ajaxurl = $(this).attr('data-url');
            $.ajax({
                type: type,
                url: ajaxurl,
                data: passwordData,
                dataType: 'json',
                success: function (data) {
                    toastr.success("Đổi mật khẩu thành công.");
                    $('#old_password_dc').val(data.password);
                    jQuery('#account_edit_password_form').trigger("reset");
                    jQuery('#account_edit_password_formModal').modal("hide");
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });


});

