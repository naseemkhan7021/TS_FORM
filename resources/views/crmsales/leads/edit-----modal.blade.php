

<style>
    .modal-dialog #addLead {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }
    input[type='date'] {
    width: 11rem;
}
.img-fluid-2{
    max-width: 70%;
    height: auto;
}
.required:after {
    content:" *";
    color: red;
  }

</style>

{{-- <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script>
    var picker = new Pikaday({ field: document.getElementById('upd_dtStart') });
</script> --}}

{{-- modal-dialog-centered --}}

<div class="modal fade editLead " wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="editLead">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update LEAD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update" autocomplete="off">
                    <input type="hidden" wire:model="cid">

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="" class='required'>First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" wire:model.lazy="upd_first_name" autocomplete="false">
                                <span class="text-danger"> @error('upd_first_name') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="" class='required'>Middle Name </label>
                                <input type="text" class="form-control" placeholder="Middle Date" wire:model="upd_middle_name" autocomplete="false">
                                <span class="text-danger"> @error('upd_middle_name') {{ $message }}@enderror</span>
                            </div>

                            <div class="col">
                                <label for="">Member last Name</label>
                                <input type="text" class="form-control" placeholder="last Name" wire:model="upd_last_name" autocomplete="false">
                                <span class="text-danger"> @error('upd_last_name') {{ $message }}@enderror</span>
                            </div>
                        </div>

                    </div>

                <br>

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

