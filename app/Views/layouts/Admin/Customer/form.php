<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <button type="button" id="back" class="btn btn-info float-right">ย้อนกลับ</button>
                </div>
                <!-- /.card-header -->
                <!--   $builder->select("id, first_name, last_name, phone, image, update_date"); -->
                <div class="card-body">

                    <form id="frmData">
                        <div class="modal-header">
                            <h5 class="modal-title" id="FormAddLabel">แบบบันทึกข้อมูล Customer</h5>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="first_name">First Name</span>
                                <input type="text" class="form-control" id="first_nameVal" name="first_name" placeholder="Enter your first name" value="<?php echo (isset($data) & !empty($data) ? $data->first_name : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="last_name">Last Name</span>
                                <input type="text" class="form-control" id="last_nameVal" name="last_name" placeholder="Enter your last name" value="<?php echo (isset($data) & !empty($data) ? $data->last_name : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="phone">Phone</span>
                                <input type="number" class="form-control" id="phoneVal" name="phone" placeholder="Enter your number phone" value="<?php echo (isset($data) & !empty($data) ? $data->phone : '') ?>">
                            </div>
                            <div class="input-group mb-3" enctype="multipart/form-data">
                                <input type="file" class="form-control" name="image" id="image" value="<?php echo (isset($data) & !empty($data) ? $data->image_filename : '') ?>">
                            </div>
                            <div class="col-md-12 text-center mb-3">
                                <img src="<?php echo (isset($data) && !empty($data) ? 'data:' . $data->image_type . ';base64,' . $data->image : ''); ?>" id="imageVal" width="150" class="mt-30">
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