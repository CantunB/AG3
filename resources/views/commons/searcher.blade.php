<form class="form-inline">
    <div class="form-group">
        <div class="input-group input-group-sm">
            <input type="text" class="form-control border-1 shadow flatpickr_range" id="search_date" name="search_date" onclick="Example.open();" placeholder="Selecciona una fecha">
            <input type="hidden" id="ID_START" >
            <input type="hidden" id="ID_END" >
            <div class="input-group-append">
                    <button type="button" id="btnsearch" class="btn btn-sm btn-dark"> <i class="mdi mdi-calendar-range"></i></button>
            </div>
        </div>
    </div>
    <button type="button" id="btnrefresh" class="btn btn-dark btn-sm ml-2">
        <i class="mdi mdi-autorenew"></i>
    </button>
</form>
