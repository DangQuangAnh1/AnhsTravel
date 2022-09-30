<div class="modal fade" id="order_add_formModal" aria-hidden="true" style="text-align: left;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-dark pb-4" style=" display: block; position: relative;background-color: #80b157;">
                <h5 class="modal-title pb-2" id="formModalLabel">Liên hệ với chúng tôi</h5>
                <p">
                    Chúng tôi là những chuyên gia luôn tự hào về những hành trình được thiết kế riêng phù hợp với mọi nhu cầu. Vui lòng điền vào biểu mẫu bên dưới và một thành viên trong nhóm của chúng tôi sẽ sớm liên hệ với bạn.
                    </p>
                    <div class="col-2 bg-success p-2 text-center rounded text-white" style="position: absolute; bottom: -15px; left:40px ; z-index: 3;">
                        Đặt tour
                    </div>
            </div>
            <form id="order_add_form" name="order_add_form" class="form-horizontal" data-url="{{ route('order.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body text-dark pt-5">
                    <p>
                        Tên tour: {{$tour->tour_name}}
                    </p>
                    <p>
                        Giá: {{$tour->tour_price}} đồng/1 người lớn (Trẻ em giảm 50%)
                    </p>
                    <div class="row mb-3">
                    <div class="col form-group">
                        <label>Họ và tên: </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $user->name }}">
                    </div>
                    <div class="col form-group">
                        <label>Số điện thoại: </label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your phone number" value="{{ $user->phone_number }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-6 form-group">
                        <label>Ngày khởi hành (ước tính): </label>
                        <input type="date" class="form-control" id="travel_date" name="travel_date" placeholder="Enter estimated travel date" value="">
                    </div>
                    <div class="col-3 form-group">
                        <label>Số người lớn: </label>
                        <input type="number" class="form-control" id="adults" name="adults" placeholder="Enter adults number" value="">
                    </div>
                    <div class="col-3 form-group">
                        <label>Số trẻ em: </label>
                        <input type="number" class="form-control" id="childrens" name="childrens" placeholder="Enter childrens number" value="">
                    </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Phương thức thanh toán: </label>
                        <select class="form-select" id="payment" name="payment" value="">
                            <option value="" disabled>Payment methods</option>
                            <option value="truc tiep">Thanh toán trực tiếp bằng tiền mặt</option>
                            <option value="vnpay">Thanh toán qua ví VNPay</option>
                            <option value="nganhang">Thanh toán bằng ngân hàng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Những lưu ý (Nếu có)</label>
                        <textarea class="form-control" id="note" name="note" placeholder="Enter your note" value="" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" id="tour_id" name="tour_id" value="{{ $tour->id }}">
                    <input type="hidden" id="status" name="status" value="Chưa thanh toán">
                    <button type="submit" class="col-3 btn btn-primary" id="order_add_btn" value="add">Đặt Tour</button>
                </div>
            </form>
        </div>
    </div>
</div>