<div class="modal fade editParticipants" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Header</h5>
                <button wire:click='clearValidationf()' type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update" class="row g-3">

                    <input wire:model="cid" hidden>
                    {{-- project detail start --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="project name"
                                class="form-label @error('formdata_22s_id_fk') text-danger @enderror">Vanue</label>

                            <select wire:model="formdata_22s_id_fk"
                                class="form-control  @error('formdata_22s_id_fk') border-danger @enderror">
                                <option selected disabled value="0">Vanue name</option>
                                @foreach ($form22HeadData as $item)
                                    <option value="{{ $item->formdata_22s_id }}">{{ $item->venue }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="@error('header_ehsind_dt') text-danger @enderror">Data/Time
                                @error('header_ehsind_dt') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" wire:model="header_ehsind_dt" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-controp">
                            <label for="" class="@error('totalNumberOfParticipant') text-danger @enderror">Total number
                                of Participants</label>
                            <input style="width: unset" type="text"
                                {{$formdata_22s_id_fk >= 1 ? '' : 'disabled'}} class="form-control d-inline  @error('totalNumberOfParticipant') border-danger @enderror"
                                wire:model="totalNumberOfParticipant">
                            <input style="height: calc(1.5em + 0.9rem + 4px);" type="button"
                                wire:click='addParticipant()' {{$formdata_22s_id_fk >= 1 ? '' : 'disabled'}}  class="btn btn-outline-success btn-sm rounded"  value="+">

                        </div>
                    </div>

                    {{-- <div class="col-12"> --}}
                    <hr width="100%">
                    {{-- </div> --}}

                    <div class="col-md-2">
                        <div class="form-controp">
                            <label for="" class="@error('id_no') text-danger @enderror">Id No</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Participant Name</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="venue">Age</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="desgination">Desgination</label>

                        </div>
                    </div>

                    @if ($totalNumberOfParticipant != 0 || null)
                        @forelse (range(0,$totalNumberOfParticipant) as $item => $index)
                            {{-- {{$totalNumberOfParticipant}} --}}
                            <div class="col-md-2">
                                <input required type="text" class="form-control @error('id_no') border-danger @enderror"
                                    wire:model="id_no.{{$index}}" placeholder="Participant Id {{$item}}">
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input required type="number"
                                        class="form-control  @error('participant_name') border-danger @enderror"
                                        placeholder="Participant Name {{$item}}" wire:model="participant_name.{{$index}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="age" type="number"
                                        class="form-control  @error('age') border-danger @enderror" placeholder="age {{$item}}"
                                        wire:model="age.{{$index}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input required id="desgination" type="text"
                                        class="form-control  @error('desgination') border-danger @enderror"
                                        placeholder="Desgination {{$item}}" wire:model="desgination.{{$index}}">
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                        <input type="button" wire:click='removeParticipant({{ $index }})'
                                            class="btn btn-outline-danger btn-sm rounded w-100" value="remove">
                                </div>
                            </div>

                        @empty
                            <span class="text-danger">Add number of Participant</span>

                        @endforelse
                    @else
                        <span class="text-danger">Add number of Participant</span>
                    @endif


                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_safety_in_charge_name">Site Safety In Charge Name</label>
                            <input id="site_safety_in_charge_name" type="text"
                                class="form-control  @error('site_safety_in_charge_name') border-danger @enderror"
                                placeholder="Site Safety In Charge Name" wire:model="site_safety_in_charge_name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_safety_in_charge_sign">Site Safety In Charge Sign</label>
                            <input id="site_safety_in_charge_sign" type="text"
                                class="form-control  @error('site_safety_in_charge_sign') border-danger @enderror"
                                placeholder="Site Safety In Charge Sign" wire:model="site_safety_in_charge_sign">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input id="duration" type="text"
                                class="form-control  @error('duration') border-danger @enderror" placeholder="Duration"
                                wire:model="duration">
                        </div>
                    </div> --}}

                    {{-- <div class="col-md-6"></div>

                    <div class="col-12">

                        <label for=""><strong><u class="">Undertaking</u></strong>
                            <p class="mb-1">
                                I, the undersigned, have attended the EHS Induction Training and understood the
                                requirements of following Health & Safety rules in work place and agreed to follow them.
                                My signature is appended below.
                                The following Staff / Technicians / Contractor / Labour have joined and commenced work
                                at site. They have been imparted EHS Induction Training. The Points covered in the
                                training are:

                            </p>
                            <strong class="ml-5">Topics Discussed:</strong> ( Tick ✓ in the Boxes ) @error('topic_discusseds_ids') <strong class="ml-5 text-danger">Please Select At Least One</strong>  @enderror
                        </label>
                        <div class="row g-3">
                            @foreach ($topicData as $item)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check my-1 ml-2">
                                            <input wire:model='topic_discusseds_ids' class="form-check-input"
                                                type="checkbox" value="{{ $item->topic_discusseds_id }}"
                                                id="topic{{ $item->topic_discusseds_id }}_add">
                                            <label class="ml-3 form-check-label @error('topic_discusseds_ids') text-danger
                                            @enderror"
                                                for="topic{{ $item->topic_discusseds_id }}_add">
                                                {{ $item->topic_discusseds_id }}.
                                                {{ $item->topic_discusseds_description }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}


                    {{-- project detail end --}}

                    <hr class="text-secondary w-100">

                    <div class="col-12">
                        <div class="form-group">
                            <button wire:click='clearValidationf()' type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
