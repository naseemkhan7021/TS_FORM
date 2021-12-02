

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

<div class="modal fade editProjectunit " wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-lg" role="document" >
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Projects</h5>
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
                                <label for="">Rera ID</label>
                                <input type="text" class="form-control" placeholder="Rera ID" wire:model="upd_sReraID">
                                <span class="text-danger"> @error('upd_sReraID') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Start Date </label>
                                <input type="text" class="form-control" placeholder="Start Date" wire:model.lazy="upd_dtStart"  id="upd_dtStart" name="upd_dtStart" >
                                <span class="text-danger"> @error('upd_dtStart') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Development Charges </label>
                                <input type="text" class="form-control" placeholder="Development Charges" wire:model="upd_mDevelopmentCostPerSqft">
                                <span class="text-danger"> @error('upd_mDevelopmentCostPerSqft') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Loading </label>
                                <input type="text" class="form-control" placeholder="Loading" wire:model="upd_iLoadingPercentage">
                                <span class="text-danger"> @error('upd_iLoadingPercentage') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">No. of Wings</label>
                                <input type="text" class="form-control" placeholder="No. of Wings" wire:model="upd_iNoofWings">
                                <span class="text-danger"> @error('upd_iNoofWings') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Floors</label>
                                <input type="text" class="form-control" placeholder="No. of Floors" wire:model="upd_iNoofFloors">
                                <span class="text-danger"> @error('upd_iNoofFloors') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">No. of Flats Per Floor</label>
                                <input type="text" class="form-control" placeholder="No. of Flats Per Floor" wire:model="upd_iFlatPerFloor">
                                <span class="text-danger"> @error('upd_iFlatPerFloor') {{ $message }} @enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Shops</label>
                                <input wire:model="upd_iShops" type="text" class="form-control" placeholder="No. of Shops" >
                                <span class="text-danger"> @error('upd_iShops') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Commericial Offices</label>
                                <input wire:model="upd_iOffice" type="text" class="form-control font-black" placeholder="No. of Commericial Offices" >
                                <span class="text-danger"> @error('upd_iOffice') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>





                    {{-- <div class="form-group">
                        <label for="">Rera ID</label>
                        <input type="text" class="form-control" placeholder="Rera ID" wire:model="upd_sReraID">
                        <span class="text-danger"> @error('upd_sReraID') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Start Date </label>
                        <input type="text" class="form-control" placeholder="Start Date" wire:model="upd_dtStart">
                        <span class="text-danger"> @error('upd_dtStart') {{ $message }}@enderror</span>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="">Development Charges </label>
                        <input type="text" class="form-control" placeholder="Development Charges" wire:model="upd_mDevelopmentCostPerSqft">
                        <span class="text-danger"> @error('upd_mDevelopmentCostPerSqft') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Loading </label>
                        <input type="text" class="form-control" placeholder="Loading" wire:model="upd_iLoadingPercentage">
                        <span class="text-danger"> @error('upd_iLoadingPercentage') {{ $message }}@enderror</span>
                    </div> --}}


                    {{-- <div class="form-group">
                        <label for="">No. of Wings</label>
                        <input type="text" class="form-control" placeholder="No. of Wings" wire:model="upd_iNoofWings">
                        <span class="text-danger"> @error('upd_iNoofWings') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">No. of Floors</label>
                        <input type="text" class="form-control" placeholder="No. of Floors" wire:model="upd_iNoofFloors">
                        <span class="text-danger"> @error('upd_iNoofFloors') {{ $message }}@enderror</span>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="">No. of Flats Per Floor</label>
                        <input type="text" class="form-control" placeholder="No. of Flats Per Floor" wire:model="upd_iFlatPerFloor">
                        <span class="text-danger"> @error('upd_iFlatPerFloor') {{ $message }} @enderror</span>
                    </div>


                    <div class="form-group">
                        <label for="">No. of Shops</label>
                        <input type="text" class="form-control" placeholder="No. of Shops" wire:model="upd_iShops">
                        <span class="text-danger"> @error('upd_iShops') {{ $message }}@enderror</span>
                        </div>

                    <div class="form-group">
                        <label for="">No. of Commericial Offices</label>
                        <input type="text" class="form-control" placeholder="No. of Commericial Offices" wire:model="upd_iOffice">
                        <span class="text-danger"> @error('upd_iOffice') {{ $message }}@enderror</span>
                    </div> --}}

                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

<script>
    // var picker = new Pikaday({ field: document.getElementById('datepicker') });

    var picker = new Pikaday({
    field: document.getElementById('upd_dtStart'),
    format: 'Y-m-d',
    toString(date, format) {
        // you should do formatting based on the passed format,
        // but we will just return 'D/M/YYYY' for simplicity
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${year}-${month}-${day}`;
    },
    parse(dateString, format) {
        // dateString is the result of `toString` method
        const parts = dateString.split('/');
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10) - 1;
        const year = parseInt(parts[2], 10);
        return new Date(year, month, day);
    }
});


</script>

