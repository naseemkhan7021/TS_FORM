<div class="modal fade editHeader22" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update Header</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                class="form-label @error('iproject_id_fk') text-danger @enderror">Project</label>

                            <select wire:model="iproject_id_fk"
                                class="form-control  @error('iproject_id_fk') border-danger @enderror">
                                <option selected disabled value="0">Project name</option>
                                @foreach ($projectData as $item)
                                    <option value="{{ $item->iproject_id }}">{{ $item->sproject_name }}</option>
                                @endforeach
                            </select>
                            {{-- {{ $iproject_id_fk }} --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">

                            <label for="" class="">Location
                            </label>
                            <input type="text" class="form-control" placeholder="Location"
                                wire:model="sproject_location" readonly>
                            {{-- <span class="text-danger"> 
                                    @error('sproject_location')
                                        {{ $message }}@enderror</span> --}}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-controp">
                            <label for="" class="@error('ehsind_dt') text-danger @enderror">Data/Time
                                @error('ehsind_dt') <i class="text-danger fas fa-times-circle"></i>@enderror</label>
                            <input type="text" class="form-control" wire:model="ehsind_dt">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Contractor Name</label>
                            <input type="text" class="form-control  @error('contractor_name') border-danger @enderror"
                                placeholder="Contractor Name" wire:model="contractor_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="venue">Venue</label>
                            <input id="venue" type="text" class="form-control  @error('venue') border-danger @enderror"
                                placeholder="venue" wire:model="venue">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="faculty_name">Faculty Name</label>
                            <input id="faculty_name" type="text"
                                class="form-control  @error('faculty_name') border-danger @enderror"
                                placeholder="Faculty Name" wire:model="faculty_name">
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="faculty_sign">Faculty Sign</label>
                            <input id="faculty_sign" type="text"
                                class="form-control  @error('faculty_sign') border-danger @enderror"
                                placeholder="Faculty_Sign" wire:model="faculty_sign">
                        </div>
                    </div>


                    <div class="col-md-6">
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
                    </div>

                    <div class="col-md-6"></div>

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
                            <strong class="ml-5">Topics Discussed:</strong> ( Tick ✓ in the Boxes )
                            @error('topic_discusseds_ids') <strong class="ml-5 text-danger">Please Select At Least
                                One</strong> @enderror
                        </label>
                        <div class="row g-3">
                            @foreach ($topicData as $item)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check my-1 ml-2">
                                            <input wire:model.defer='topic_discusseds_ids' class="form-check-input"
                                                type="checkbox" value="{{ $item->topic_discusseds_id }}"
                                                id="topic{{ $item->topic_discusseds_id }}_edit">
                                            <label
                                                class="ml-3 form-check-label @error('topic_discusseds_ids') text-danger
                                            @enderror"
                                                for="topic{{ $item->topic_discusseds_id }}_edit">
                                                {{ $item->topic_discusseds_id }}.
                                                {{ $item->topic_discusseds_description }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- project detail end --}}

                    {{-- Show Partisipance start --}}

                    {{-- {{dd($partisipanceData)}} --}}
                    <div class="col-12">
                        @if ($partisipanceId == 0)
                            <h4 class="text-danger text-center">No Participant add at</h4>
                        @else
                            <table class="table text-center">
                                <h4 class="text-center">ALL Added Member <a
                                        wire:click='openParticipantsModel({{ $partisipanceId }})' href="#"> Edit</a>
                                </h4>
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>age</th>
                                        <th>Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{dd($id_no)}} --}}
                                    @php($len = count($id_no))
                                    @forelse ($partisipanceData as $row)
                                    df
                                        @forelse (range(0,$len-1) as $item)
                                            <tr>
                                                <td>{{ explode(',', $row->id_no)[$item] }}</td>
                                                <td>{{ explode(',', $row->participant_name)[$item] }}</td>
                                                <td>{{ explode(',', $row->age)[$item] }}</td>
                                                <td>{{ explode(',', $row->desgination)[$item] }}</td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    @empty
                                        No Participant Here
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        @endif

                    </div>

                    {{-- no partisipance at {{$dum}} --}}
                    {{-- Show Partisipance end --}}

                    <div class="col-12">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
