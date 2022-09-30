<div class="modal fade" id="formModal" aria-hidden="true" style="text-align: left;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-dark pb-4" style=" display: block; position: relative;background-color: #80b157;">
                <h5 class="modal-title pb-2" id="formModalLabel">Liên hệ với chúng tôi</h5>
                <p>
                    Chúng tôi là những chuyên gia luôn tự hào về những hành trình được thiết kế riêng phù hợp với mọi nhu cầu. Vui lòng điền vào biểu mẫu bên dưới và một thành viên trong nhóm của chúng tôi sẽ sớm liên hệ với bạn.
                </p>
                <div class="col-2 bg-success p-2 text-center rounded text-white" style="position: absolute; bottom: -15px; left:40px ; z-index: 3;">
                    Đặt câu hỏi
                </div>
            </div>
            <form id="myForm" name="myForm" class="form-horizontal" data-url="{{ route('talk.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body text-dark pt-5">
                    <p>
                        Vui lòng điền thông tin thích hợp bên dưới về bất kỳ kế hoạch du lịch hoặc thắc mắc nào. Đội ngũ chuyên gia du lịch của chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất.
                    </p>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description" value="" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="sender" name="sender" value="
                    <?php
                    if ($user != NULL) {
                        echo "$user->id";
                    }
                    ?>
                    ">
                    <input type="hidden" id="receiver" name="receiver" value="admin">
                    <button type="submit" class="col-3 btn btn-primary" id="btn-save" value="add">Gửi tin</button>
                </div>
            </form>
        </div>
    </div>
</div>