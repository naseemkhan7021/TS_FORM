

<style>
    .modal-dialog {
        border: 2mm solid lightgray;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }
</style>

{{-- <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script>
    var picker = new Pikaday({ field: document.getElementById('upd_dtStart') });
</script> --}}

{{-- modal-dialog-centered --}}

<div class="modal fade editProjectwings" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-lg" role="document" >
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Projects Wings & Floors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="cid">

                    <div class="form-group">
                        <label for="">Project Name </label>
                        <input type="text" class="form-control" placeholder="Project Name" wire:model="upd_sProjectName">
                        <span class="text-danger"> @error('upd_sProjectName') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Location </label>
                        <input type="text" class="form-control" placeholder="Location" wire:model="upd_sLocation">
                        <span class="text-danger"> @error('upd_sLocation') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Wing Description</label>
                                <input type="text" class="form-control" placeholder="Wing Description" wire:model="upd_sWingDescription">
                                <span class="text-danger"> @error('upd_sWingDescription') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Wing Abbrivation </label>
                                <input type="text" class="form-control" placeholder="Wing Abbrivation" wire:model.lazy="upd_sWingAbbr"   >
                                <span class="text-danger"> @error('upd_sWingAbbr') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No of Floors </label>
                                <input type="text" class="form-control" placeholder="No of Floors" wire:model.lazy="upd_iFloors"   >
                                <span class="text-danger"> @error('upd_iFloors') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Flats Per Floor </label>
                                <input type="text" class="form-control" placeholder="Flats Per Floor" wire:model.lazy="upd_iUnitsperfloor"   >
                                <span class="text-danger"> @error('upd_iUnitsperfloor') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Shops ( Ground Floor)</label>
                                <input type="text" class="form-control" placeholder="Shops" wire:model.lazy="upd_iShopsW">
                                <span class="text-danger"> @error('upd_iShopsW') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Offices ( First Floor) </label>
                                <input type="text" class="form-control" placeholder="Offices" wire:model.lazy="upd_iOfficeW"   >
                                <span class="text-danger"> @error('upd_iOfficeW') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



