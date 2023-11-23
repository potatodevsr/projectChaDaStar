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
                            <h5 class="modal-title" id="FormAddLabel">แบบบันทึกข้อมูลที่อยู่</h5>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="street">Street</span>
                                <input type="text" class="form-control" id="streetVal" name="street" aria-describedby="street" value="<?php echo (isset($data) & !empty($data) ? $data->street : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="city">City</span>
                                <input type="text" class="form-control" id="cityVal" name="city" aria-describedby="city" value="<?php echo (isset($data) & !empty($data) ? $data->city : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="state">State</span>
                                <input type="text" class="form-control" id="stateVal" name="state" aria-describedby="state" value="<?php echo (isset($data) & !empty($data) ? $data->state : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="zipcode">Zipcode</span>
                                <input type="text" class="form-control" id="zipcodeVal" name="zipcode" aria-describedby="zipcode" value="<?php echo (isset($data) & !empty($data) ? $data->zipcode : '') ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="county">County</span>
                                <input type="text" class="form-control" id="countyVal" name="county" aria-describedby="county" value="<?php echo (isset($data) & !empty($data) ? $data->county : '') ?>">
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
