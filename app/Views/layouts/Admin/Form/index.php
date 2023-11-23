<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        เพิ่มข้อมูลประชากร
                    </h3>
                    <button type="button" id="add" class="btn btn-info float-right">เพิ่มข้อมูล</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="data_table" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">ชื่อ</th>
                                <th class="text-center">นามสกุล</th>
                                <th class="text-center">อายุ</th>
                                <th class="text-center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="FormAdd" tabindex="-1" aria-labelledby="FormAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmData">
                <div class="modal-header">
                    <h5 class="modal-title" id="FormAddLabel">แบบบันทึกข้อมูลประชากร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name">ชื่อ</span>
                        <input type="text" class="form-control" id="nameVal" name="name" aria-describedby="name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="lastname">นามสกุล</span>
                        <input type="text" class="form-control" id="lastnameVal" name="lastname" aria-describedby="lastname">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="age">อายุ</span>
                        <input type="text" class="form-control" id="ageVal" name="age" aria-describedby="age">
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" id="btnAction" class="btn btn-primary">บันทึก</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>