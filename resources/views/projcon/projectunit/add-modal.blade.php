<style>
    .modal-dialog  #addProject {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }
</style>

{{-- modal-dialog-centered --}}

<div class="modal fade addProjectunit " wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" id="addProject">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Projects</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="">Project Name </label>
                        <input type="text" class="form-control" placeholder="Project Name" wire:model="sProjectName">
                        <span class="text-danger"> @error('sProjectName') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Location </label>
                        <input type="text" class="form-control" placeholder="Location" wire:model="sLocation">
                        <span class="text-danger"> @error('sLocation') {{ $message }}@enderror</span>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Rera ID</label>
                                <input type="text" class="form-control" placeholder="Rera ID" wire:model="sReraID">
                                <span class="text-danger"> @error('sReraID') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Start Date </label>
                                <input type="text" class="form-control" placeholder="Start Date" wire:model.lazy="dtStart"  id="dtStart" name="dtStart" >
                                <span class="text-danger"> @error('dtStart') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Development Charges </label>
                                <input type="text" class="form-control" placeholder="Development Charges" wire:model="mDevelopmentCostPerSqft">
                                <span class="text-danger"> @error('mDevelopmentCostPerSqft') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">Loading </label>
                                <input type="text" class="form-control" placeholder="Loading" wire:model="iLoadingPercentage">
                                <span class="text-danger"> @error('iLoadingPercentage') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">No. of Wings</label>
                                <input type="text" class="form-control" placeholder="No. of Wings" wire:model="iNoofWings">
                                <span class="text-danger"> @error('iNoofWings') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Floors</label>
                                <input type="text" class="form-control" placeholder="No. of Floors" wire:model="iNoofFloors">
                                <span class="text-danger"> @error('iNoofFloors') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">No. of Flats Per Floor</label>
                                <input type="text" class="form-control" placeholder="No. of Flats Per Floor" wire:model="iFlatPerFloor">
                                <span class="text-danger"> @error('iFlatPerFloor') {{ $message }} @enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Shops</label>
                                <input wire:model="iShops" type="text" class="form-control" placeholder="No. of Shops" >
                                <span class="text-danger"> @error('iShops') {{ $message }}@enderror</span>
                            </div>
                            <div class="col">
                                <label for="">No. of Commericial Offices</label>
                                <input wire:model="iOffice" type="text" class="form-control font-black" placeholder="No. of Commericial Offices" >
                                <span class="text-danger"> @error('iOffice') {{ $message }}@enderror</span>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
    field: document.getElementById('dtStart'),
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
