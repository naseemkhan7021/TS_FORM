@php
if ($iproject_id_fk) {
    # code...
    $sproject_obj = DB::table('projects')
        ->where('iproject_id', '=', $iproject_id_fk)
        ->get();
    $this->sproject_location = $sproject_obj[0]->sproject_location;
    $this->ibc_id_fk = $sproject_obj[0]->ibc_id_fk;
    $this->idepartment_id_fk = $sproject_obj[0]->idepartment_id_fk;
}

// L_consequence
if ($I_scale_of_impact_id_fk && $J_severty_of_impact_id_fk && $K_duration_of_impact_id_fk) {
    # code...
    $scaleofImpct_obj = DB::table('scale_of_impacts')
        ->where('scale_of_impact_id', '=', $I_scale_of_impact_id_fk)
        ->get();
    $severtyofImpct_obj = DB::table('severty_of_impacts')
        ->where('severty_of_impact_id', '=', $J_severty_of_impact_id_fk)
        ->get();
    $durationofImpct_obj = DB::table('duration_of_impacts')
        ->where('duration_of_impact_id', '=', $K_duration_of_impact_id_fk)
        ->get();

    $this->L_consequence = ($scaleofImpct_obj[0]->scale_of_impact_value ? $scaleofImpct_obj[0]->scale_of_impact_value : 1) * ($severtyofImpct_obj[0]->severty_of_impact_value ? $severtyofImpct_obj[0]->severty_of_impact_value : 1) * ($durationofImpct_obj[0]->duration_of_impact_value ? $durationofImpct_obj[0]->duration_of_impact_value : 1);

    $this->O_significance_score_level = $this->L_consequence > 29 ? 'Nonsignificant' : 'Significant';

    // $this->ifnotAcceptable = $this->L_consequence > 29 ? true : false;
}
if ($M_probability_id_fk && $L_consequence) {
    # code...
    $probabilit_obj = DB::table('probabilities')
        ->where('probability_id', '=', $M_probability_id_fk)
        ->get();
    $this->N_impact_score = ($probabilit_obj[0]->probability_value ? $probabilit_obj[0]->probability_value : 1) * $this->L_consequence;
}

@endphp

<div>
    @php $button_title = 'Add New Assessment (ERA)' @endphp
    @php $data_not_found = 'No Assessment (ERA) Data Found' @endphp


    <div class="row">
        <div class="col-sm-8">
            <div class="text-sm-left">
                <button class="btn btn-danger waves-effect waves-light mb-2" wire:click="OpenAddCountryModal()">
                    {{ $button_title }} </button>
                <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i
                        class="mdi mdi-cog"></i></button>
            </div>
        </div>
        <div class="col-md-4">
            <input wire:model="searchQuery" type="text" placeholder="Search..." class="form-control">
        </div>
    </div>

    <div class="overflow-auto">
        <table class="table display table-bordered data-table text-center" style="width:130%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th>B_Activity</th>
                    <th>C_Sub_Activity</th>
                    <th>E_Environmental Impact</th>
                    <th>F_Condition of Impact</th>
                    <th title="G_existing_controls_as_per_hierarchy">G_existing_controls...</th>
                    <th>H_Organization Requirement</th>
                    <th title="O_significance_score_level">O_significance</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $formdata66 as  $row )
                    <tr>
                        <td>{{ $formdata66->firstItem() + $loop->index }}</td>
                        <td>{{ $row->sproject_name }}</td>
                        <td>{{ $row->activity_description }}</td>
                        <td>{{ $row->sub_activity_description }}</td>
                        <td>{{ $row->environmental_impact_description }}</td>
                        <td>{{ $row->F_condition_of_impact }}</td>
                        <td>{{ $row->G_existing_controls_as_per_hierarchy }}</td>
                        <td>{{ $row->organization_requirement_description }}</td>
                        <td
                            style="{{ $row->O_significance_score_level != 'Nonsignificant' ? 'background: red;color: white;font-weight: 900;font-size: 1.1rem;' : 'background: green;color: white;font-weight: 900;font-size: 1.1rem;' }}">
                            {{ $row->O_significance_score_level }}</td>
                        <td>{{ Carbon\Carbon::parse($row->form66create)->diffForHumans() }}</td>
                        <td>
                            @if (Auth::user()->id == $row->user_created)
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm"
                                    wire:click="OpenEditCountryModal({{ $row->formdata66_id }})">Edit</button>
                                <button class="btn btn-danger btn-sm"
                                    wire:click="deleteConfirm({{ $row->formdata66_id }})">Delete</button>

                            </div>
                            @else
                            <button class="btn btn-success btn-sm"
                                    wire:click="OpenEditCountryModal({{ $row->formdata66_id }})">View</button>
                        @endif
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="15">'{{ $data_not_found }}</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    @if (count($formdata66))
        {{ $formdata66->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_66.formdata66.add-modal')
    @include('Forms.Forms_66.formdata66.edit-modal')

</div>
