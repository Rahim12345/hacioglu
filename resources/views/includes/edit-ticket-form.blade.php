<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <!-- Static backdrop -->
            <button id="editStockFormButtonShower" class="btn btn-primary d-none" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                Toggle static offcanvas
            </button>

            <div class="offcanvas offcanvas-end ticket-offcanvas" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
                 aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="staticBackdropLabel">
                        Stoku redaktə edin
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form action="" method="POST" id="stockForm">
                        <input type="hidden" name="stock_id" id="stock_id">
                        @csrf

                        <div class="col-md-12">
                            <div class="row gx-3">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="edit_model" class="form-label">Model</label>
                                        <input type="text" class="form-control" id="edit_model" name="edit_model" placeholder="Model" autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <label for="edit_xususiyyetler" class="form-label">Xüsusiyyətlər</label>
                                        <input type="text" class="form-control" id="edit_xususiyyetler" name="edit_xususiyyetler" placeholder="Xüsusiyyətlər" autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <label for="edit_nagd" class="form-label">Nağd</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_nagd" name="edit_nagd" placeholder="Nağd" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_birkart" class="form-label">Birkart</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_birkart" name="edit_birkart" placeholder="Birkart" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_barcode" class="form-label">Barcode</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="edit_barcode" name="edit_barcode" placeholder="Barcode" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary float-end" id="editStock">
                                            Yadda saxla
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
