<div class="modal fade" id="order_edit_formModal_{{ $tour->id }}" aria-hidden="true" style="text-align: left;">
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
            <form id="order_edit_form_{{ $tour->id }}" name="order_edit_form" class="form-horizontal" data-url="{{ route('order.update',$tour->id) }}">
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
                        <input type="text" class="form-control" id="name_{{ $tour->id }}" name="name" placeholder="Enter name" value="{{ $user->name }}">
                    </div>
                    <div class="col form-group">
                        <label>Số điện thoại: </label>
                        <input type="text" class="form-control" id="phone_number_{{ $tour->id }}" name="phone_number" placeholder="Enter your phone number" value="{{ $user->phone_number }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-6 form-group">
                        <label>Ngày khởi hành (ước tính): </label>
                        <input type="date" class="form-control" id="travel_date_{{ $tour->id }}" name="travel_date" placeholder="Enter estimated travel date" value="">
                    </div>
                    <div class="col-3 form-group">
                        <label>Số người lớn: </label>
                        <input type="number" class="form-control" id="adults_{{ $tour->id }}" name="adults" placeholder="Enter adults number" value="">
                    </div>
                    <div class="col-3 form-group">
                        <label>Số trẻ em: </label>
                        <input type="number" class="form-control" id="childrens_{{ $tour->id }}" name="childrens" placeholder="Enter childrens number" value="">
                    </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Phương thức thanh toán: </label>
                        <select class="form-select" id="payment_{{ $tour->id }}" name="payment" value="">
                            <option value="" disabled>Payment methods</option>
                            <option value="truc tiep">Thanh toán trực tiếp bằng tiền mặt</option>
                            <option value="vnpay">Thanh toán qua ví VNPay</option>
                            <option value="nganhang">Thanh toán bằng ngân hàng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Những lưu ý (Nếu có)</label>
                        <textarea class="form-control" id="note_{{ $tour->id }}" name="note" placeholder="Enter your note" value="" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="status_{{ $tour->id }}" name="status" value="Chưa thanh toán">
                    <button type="submit" class="col-3 btn btn-primary" id="order_edit_btn_{{ $tour->id }}" value="edit">Đặt Tour</button>
                </div>
            </form>
        </div>
    </div>
</div>