<div class="col-lg-12 col-sm-12 col-12">
    <div class="card d-flex justify-content-between flex-row p-3">
        <div class="me-2 w-100">
            <main>
                <header>
                    <img class="header-logo"
                         src="https://www.gstatic.com/images/branding/product/1x/keep_48dp.png">
                    <h2 class="header-title">Qeydlər</h2>
                </header>
                <div id="form-container">
                    <form id="form" autocomplete="off">
                        <input id="note-text" placeholder="Qeyd yaz..." type="text">
                    </form>
                </div>
                <div id="notes">
                    <div id="load_data_message"></div>
                </div>
            </main>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart"
     aria-labelledby="offcanvasStartLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasStartLabel">
            Qeydi redaktə et
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" id="noteCanvasCloser"></button>
    </div>
    <div class="offcanvas-body small">
        <div class="text-center">
            <div class="col-xxl-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" id="noteEditor">
                            <button class="btn btn-primary" type="button" id="noteUpdater">
                                <i class="fa fa-save"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
