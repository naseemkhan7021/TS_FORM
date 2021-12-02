<style>
    .modal-dialog #addLead {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }

</style>

{{-- modal-dialog-centered --}}

<div class="modal fade addPaymentTemplate" wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="addPaymentTemplate">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Payment Schedule Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save" autocomplete="off">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10">
                                <label for="">Template Header</label>
                                <input type="text" class="form-control" placeholder="Template Header" wire:model.lazy="stemplatedescription" autocomplete="false">
                                <span class="text-danger"> @error('stemplatedescription'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-2">
                                <label for="">Total Amount </label>
                                <input type="text" class="form-control" placeholder="Total Amount"
                                    wire:model="mAmount" autocomplete="false">
                                <span class="text-danger"> @error('mAmount') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="">Template Remarks</label>
                            <input type="text" class="form-control" placeholder="Template Remarks" wire:model.lazy="sdetails" autocomplete="false">
                            <span class="text-danger"> @error('sdetails') {{ $message }}@enderror</span>
                        </div>

                        <div class="col-md-2">
                            <label for="">Total Percentage </label>
                            <input type="text" class="form-control" placeholder="Total Percentage"
                                wire:model="mPercentage" autocomplete="false">
                            <span class="text-danger"> @error('mPercentage') {{ $message }}@enderror</span>
                        </div>

                        <div class="col-md-2">
                            <label for="">Total Rows </label>
                            <input type="text" class="form-control" placeholder="Total Rows"
                                wire:model.lazy="iRows" autocomplete="false">
                            <span class="text-danger"> @error('iRows') {{ $message }}@enderror</span>
                        </div>

                    </div>
                    </div>


                    <br>

                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>


                <br>
                <p class="text-xl font-bold" style="color:blue;font-weight:bolder;"> PLEASE SAVE ABOVE DATA BEFORE UPDATING BELOW TABLE DATA TO GET RESULTS </p>





                                        <div class="form-group">
                                            <div class={{ ($iRows == 0) | null ? 'd-none' : 'd-block' }}>
                                                <table border="1" width="100%">
                                                    <thead style="background-color:lightgray;color:red;">
                                                        <tr>
                                                            <th class="text-center" style="width:10%">#</th>
                                                            <th class="text-center" style="width:10%">ID</th>
                                                            <th class="text-center">Description</th>
                                                            <th class="text-center" style="width:10%">Percentage</th>
                                                            <th class="text-center" style="width:10%">Amount</th>
                                                            <th class="text-center" style="width:5%">Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @for ($index = 1; $index <= $iRows; $index++)
                                                            <tr>
                                                                <td>{{ $index }}</td>
                                                                <td>
                                                                    @if($editBodyIndex === $index )
                                                                        <input type="text"  wire:model.defer="bodydata.{{$index}}.sID"  value = `{{ $index }}` >

                                                                    @if($errors->has('bodydata.'.$index.'.sID'))
                                                                        <div style="color: red;">{{$errors->first('bodydata.'.$index.'.sID')}}</div>
                                                                    @endif

                                                                    @else

                                                                    {{ $index }}

                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($editBodyIndex === $index )
                                                                        <input type="text"  wire:model.defer="bodydata.{{$index}}.sDescription" value = `Change the Description {{ $index }}`  >

                                                                    @if($errors->has('bodydata.'.$index.'.sDescription'))
                                                                        <div style="color: red;">{{$errors->first('bodydata.'.$index.'.sDescription')}}</div>
                                                                    @endif

                                                                    @else

                                                                    Change the Description {{ $index }}

                                                                    @endif

                                                                    </td>
                                                                <td>

                                                                    @if($editBodyIndex === $index )
                                                                        <input type="text"  wire:model.defer="bodydata.{{$index}}.mPercentage"  >

                                                                    @if($errors->has('bodydata.'.$index.'.mPercentage'))
                                                                        <div style="color: red;">{{$errors->first('bodydata.'.$index.'.mPercentage')}}</div>
                                                                    @endif

                                                                    @else

                                                                        {{ number_format((int) $mPercentage / $iRows, 0) }}

                                                                    @endif



                                                                </td>


                                                                <td>

                                                                    @if($editBodyIndex === $index )
                                                                    <input type="text"  wire:model.defer="bodydata.{{$index}}.mAmount"  >

                                                                    @if($errors->has('bodydata.'.$index.'.mAmount'))
                                                                        <div style="color: red;">{{$errors->first('bodydata.'.$index.'.mAmount')}}</div>
                                                                    @endif

                                                                    @else

                                                                    {{ number_format((int) $mAmount / $iRows, 0) }}

                                                                @endif

                                                                </td>


                                                                <td>

                                                                    @if ($editBodyIndex === $index)

                                                                        <button class="btn btn-sm inline-flex btn-success"
                                                                            wire:click.prevent="saveBody({{ $index }})">Save</button>

                                                                    @else

                                                                        <button class="btn btn-sm inline-flex btn-info"
                                                                            wire:click.prevent="editBody({{ $index }})">Edit</button>

                                                                    @endif


                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>



                                </div>
                            </div>
                        </div>
                    </div>



                    {{-- <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

                    <script>
                        // var picker = new Pikaday({ field: document.getElementById('datepicker') });

                        var picker = new Pikaday({
                            field: document.getElementById('dtfollowdate'),
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
                    </script> --}}
