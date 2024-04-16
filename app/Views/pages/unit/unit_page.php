<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Unit <span style="float: right;">
                            <button type="button" class="btn waves-effect waves-light text-light"
                                style="background-color:#f16a41" data-toggle="modal" data-animation="bounce"
                                data-target=".bs-example-modal-lg">
                                <i class="fa fa-plus text-light"></i>
                                Tambah</button></span></h5>
                    <!-- <p>Add lightweight datatables to your project with using the <a
                            href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                            DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to
                        conver to a datatable</p> -->

                    <!-- Table with stripped rows -->
                    <div id="unit-table"></div>

                    <!-- End Table with stripped rows -->
                    <br>
                    <br>
                </div>
            </div>

        </div>
    </div>
</section>


<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="add-project">
                    <div class="modal-body">
                        <!-- <div class="form-group col-md-12">
                            <label for="date">Kode Unit</label>
                            <input type="text" value="" class="form-control" name="kode_unit" required>
                        </div> -->
                        <div class="form-group col-md-12">
                            <label for="date">Nama Unit</label>
                            <input type="text" class="form-control" name="nama_unit" placeholder="Nama Unit" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="aset">Status</label>
                            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                <option value="0">-</option>
                                <option value="1">Maintenance</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="aset">Playstation</label>
                            <textarea name="keterangan" class="form-control" id="" cols="1" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect waves-light btn-sm"
                            data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<!-- <button type="button" class="button pt-3 pb-3 d-block btn-sm" style="background-color: whitesmoke;"> Order Now</button> -->

<div id="edit-Unit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Form Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="javascript:void(0);" id="edit-unit">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="date">Kode Unit</label>
                        <input type="hidden" name="id_unit" id="id_unit">
                        <input type="text" class="form-control" name="kode_unit" id="kode_unit" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="date">Nama Unit</label>
                        <input type="text" class="form-control" name="nama_unit" id="nama_unit" placeholder="Nama Unit"
                            required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="aset">Status</label>
                        <select class="select2 form-control mb-3 custom-select" name="status"
                            style="width: 100%; height:36px;">
                            <option value="0">-</option>
                            <option value="1">Maintenance</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="aset">Playstation</label>
                        <select class="select2 form-control mb-3 custom-select" name="id_playstation"
                            style="width: 100%; height:36px;">
                            <?php foreach($playstation as $row) { ?>
                            <option value="<?= $row['Id_Playstation'] ?>"><?= $row['Nama_Playstation'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="aset">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="" cols="1" rows="1"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light btn-sm" data-dismiss="modal"
                        aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>