<div class="card">
    <div class="card-header" style="background-color: whitesmoke;">
        <!-- <h5 class="card-title">Custom Styled Validation</h5> -->
        <div class="row col-md-3">
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                    <option value="1">Step 1 Of 5 - When</option>
                    <option value="2" selected>Step 2 Of 5 - Unit</option>
                    <option value="3" disabled style="background-color: whitesmoke;">Step 3 Of 5 - Price</option>
                    <option value="4" disabled style="background-color: whitesmoke;">Step 4 Of 5 - Chechkout</option>
                    <option value="5" disabled style="background-color: whitesmoke;">Step 5 Of 5 - Finish</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-body">
        <br>
        <?= $content; ?>

    </div>
</div>