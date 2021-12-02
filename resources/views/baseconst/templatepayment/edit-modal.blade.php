<div class="modal fade editPaymentTemplate " wire:ignore.self tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="addPaymentTemplate">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Payment Schedule Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="cid">


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">
                                <label for="">Template Header</label>
                                <input type="text" class="form-control" placeholder="Template Header"
                                    wire:model.lazy="upd_stemplatedescription" autocomplete="false">
                                <span class="text-danger">
                                    @error('upd_stemplatedescription'){{ $message }}@enderror</span>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Total Amount </label>
                                    <input type="text" class="form-control" placeholder="Total Amount"
                                        wire:model="upd_mAmount" autocomplete="false">
                                    <span class="text-danger"> @error('upd_mAmount') {{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="">Template Remarks</label>
                                        <input type="text" class="form-control" placeholder="Template Remarks"
                                            wire:model.lazy="upd_sdetails" autocomplete="false">
                                        <span class="text-danger"> @error('upd_sdetails') {{ $message }}@enderror</span>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="">Total Percentage </label>
                                            <input type="text" class="form-control" placeholder="Total Percentage"
                                                wire:model="upd_mPercentage" autocomplete="false">
                                            <span class="text-danger"> @error('upd_mPercentage') {{ $message }}@enderror</span>
                                            </div>

                                            <div class="col-md-2">
                                                <label for="">Total Rows </label>
                                                <input type="text" class="form-control" placeholder="Total Rows"
                                                    wire:model.lazy="upd_iRows" autocomplete="false">
                                                <span class="text-danger"> @error('upd_iRows') {{ $message }}@enderror</span>
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
                                    <p class="text-xl font-bold" style="color:blue;font-weight:bolder;"> NOW YOU ARE READY TO UPDATE YOUR DETAILS DATA </p>



                                    <div class="form-group">
                                        <div>
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

                                                    @forelse ( $paytempbody as $paybody )

                                                    @if ( $paybody->templatehead_ID_FK == $upd_templatehead_ID )
                                                    <tr>
                                                        <td style="display:none;"> {{ $paybody->templatehead_ID_FK }}</td>
                                                        <td>

                                                        @if($editBodyIndex === $paybody->iLineID )
                                                            <input type="text"  wire:model.defer="bodydata.{{$paybody->iLineID}}.sID"  value = `{{ $paybody->iLineID }}` >

                                                        @if($errors->has('bodydata.'.$paybody->iLineID.'.sID'))
                                                            <div style="color: red;">{{$errors->first('bodydata.'.$paybody->iLineID.'.sID')}}</div>
                                                        @endif

                                                        @else

                                                        {{ $paybody->iLineID }}

                                                        @endif



                                                            {{-- {{ $paybody->iLineID  }} --}}


                                                        </td>
                                                        <td>{{ $paybody->sID }}</td>
                                                        <td>{{ $paybody->sDescription }}</td>
                                                        <td>{{ $paybody->iPercentage }}</td>
                                                        <td>{{ $paybody->mAmount }}</td>
                                                        <td>
                                                            @if ($editBodyIndex === $paybody->iLineID)

                                                                        <button class="btn btn-sm inline-flex btn-success"
                                                                            wire:click.prevent="saveBody({{ $paybody->iLineID }})">Save</button>

                                                                    @else

                                                                        <button class="btn btn-sm inline-flex btn-info"
                                                                            wire:click.prevent="editBody({{ $paybody->iLineID }})">Edit</button>

                                                                    @endif
                                                        </td>

                                                    </tr>
                                                    @endif

                                                    @empty

                                                    @endforelse






                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- @php $jsonans = json_decode($infobodydata, true); @endphp
                                    @php print_r($jsonans); @endphp --}}
                                    <br><br>
                                    {{  $infobodydata }}
                                    <br><br>
                                    {{-- {{  json_decode($infobodydata) }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
