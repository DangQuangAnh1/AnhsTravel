<div class="modal fade" id="formModal" aria-hidden="true" style="text-align: left;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white text-center pb-4" style=" display: block; position: relative;background-color: #80b157;">
                <h5 class="modal-title pb-2" id="formModalLabel">Tạo cuộc trò chuyện</h5>
            </div>
            <form id="myForm" name="myForm" class="form-horizontal" data-url="{{ route('talk.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body text-dark pt-5">
                    <div class="form-group">
                        <label>ID người nhận</label>
                        <input type="text" class="form-control" id="receiver" name="receiver" placeholder="Enter ID receiver" value="">
                    </div>
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
                    <input type="hidden" id="sender" name="sender" value="admin">
                    <button type="submit" class="col-3 btn btn-primary" id="btn-save" value="add">Gửi tin</button>
                </div>
            </form>
        </div>
    </div>
</div>