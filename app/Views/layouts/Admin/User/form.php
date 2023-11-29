<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <button type="button" id="back" class="btn btn-info float-right">ย้อนกลับ</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="frmData">
                        <div class="modal-header">
                            <h5 class="modal-title" id="FormAddLabel">แบบบันทึกข้อมูล User</h5>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="first_name">First Name&nbsp;<span class="text-red">*</span></span>
                                <input type="text" class="form-control" id="first_nameVal" name="first_name" placeholder="Enter your first name" value="<?php echo (isset($data) & !empty($data) ? $data->first_name : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="last_name">Last Name&nbsp;<span class="text-red">*</span></span>
                                <input type="text" class="form-control" id="last_nameVal" name="last_name" placeholder="Enter your first name" value="<?php echo (isset($data) & !empty($data) ? $data->last_name : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="email">E-mail&nbsp;<span class="text-red">*</span></span>
                                <input type="text" class="form-control required" id="emailVal" name="email" placeholder="Enter your email" value="<?php echo (isset($data) & !empty($data) ? $data->email : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="password">Password&nbsp;<span class="text-red">*</span></span>
                                <input type="text" class="form-control required" id="passwordlVal" name="password" placeholder="Enter your password" value="<?php echo (isset($data) & !empty($data) ? $data->password : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="status" name="status">Status&nbsp;<span class="text-red">*</span></span>
                                <div class="form-control">
                                    <input type="radio" checked=true name="status" id="status0" value="0" <?php echo (isset($data) && $data->status == 0) ? 'checked' : ''; ?>>
                                    Open&nbsp;&nbsp;
                                    <input type="radio" name="status" id="status1" value="1" <?php echo (isset($data) && $data->status == 1) ? 'checked' : ''; ?>> Close
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <?php
                        $onclick = isset($data) & !empty($data) ? "action($data->id, 'update')" : "action()";
                        ?>
                        <button type="button" id="btnAction" class="btn btn-primary" onclick="<?= $onclick ?>">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>