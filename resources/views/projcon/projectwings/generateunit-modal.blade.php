

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

<div class="modal fade genProjectwings" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-lg" role="document" >
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generate Projects Units for ( Wings & Floors )</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="cid">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Project Name </label>
                                <input type="text" class="form-control" placeholder="Project Name" wire:model="sProjectName">
                                <span class="text-danger"> @error('sProjectName') {{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-3">
                                <label for="">Location </label>
                                <input type="text" class="form-control" placeholder="Location" wire:model="sLocation">
                                <span class="text-danger"> @error('sLocation') {{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-2">
                                <label for="">Total Wings </label>
                                <input type="text" class="form-control" placeholder="Total Wings" wire:model="iNoofWings">
                                <span class="text-danger"> @error('iNoofWings') {{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-2">
                                <label for="">Total Shops </label>
                                <input type="text" class="form-control" placeholder="Total Shops" wire:model="iShops">
                                <span class="text-danger"> @error('iShops') {{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-2">
                                <label for="">Total Offices </label>
                                <input type="text" class="form-control" placeholder="Total Offices" wire:model="iOffice">
                                <span class="text-danger"> @error('iOffice') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">

                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Wing </label>
                                <input type="text" class="form-control" placeholder="Wing Description" wire:model="sWingDescription">
                                <span class="text-danger"> @error('sWingDescription') {{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-2">
                                <label for="">Abbrivation </label>
                                <input type="text" class="form-control" placeholder="Wing Abbrivation" wire:model.lazy="sWingAbbr"   >
                                <span class="text-danger"> @error('sWingAbbr') {{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-2">
                                <label for="">No of Floors </label>
                                <input type="text" class="form-control" placeholder="No of Floors" wire:model.lazy="iFloors"   >
                                <span class="text-danger"> @error('iFloors') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Flats / Floor </label>
                                <input type="text" class="form-control" placeholder="Flats Per Floor" wire:model.lazy="iUnitsperfloor"   >
                                <span class="text-danger"> @error('iUnitsperfloor') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Shops ( Ground)</label>
                                <input type="text" class="form-control" placeholder="Shops" wire:model.lazy="iShopsW">
                                <span class="text-danger"> @error('iShopsW') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Offices ( First ) </label>
                                <input type="text" class="form-control" placeholder="Offices" wire:model.lazy="iOfficeW"   >
                                <span class="text-danger"> @error('iOfficeW') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>


                    <hr>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="">Generate Shop Units for All the Wings</label>
                            </div>
                            <div class="col-md-1">
                                <input type="checkbox" />
                            </div>
                            <div class="col-md-3">
                                <button wire:click="genShopUnits()" type="button" class="btn btn-primary btn-sm">Generate Shop</button>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="">Generate Office Units for All the Wings</label>
                            </div>
                            <div class="col-md-1">
                                <input type="checkbox" />
                            </div>
                            <div class="col-md-3">
                                <button wire:click="genOfficeUnits()" type="button" class="btn btn-primary btn-sm">Generate Office</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="">Generate Flats ( Units ) for Selected Wings the Wings</label>
                            </div>
                            <div class="col-md-1">
                                <input type="checkbox" />
                            </div>
                            <div class="col-md-3">
                                <button wire:click="genResidentialUnits()" type="button" class="btn btn-primary btn-sm">Generate Flats ( Units )</button>
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



