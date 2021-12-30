@php
if ($iproject_id_fk) {
    # code...
    $sproject_location_obj = DB::table('projects')
        ->where('iproject_id', '=', $iproject_id_fk)
        ->get();
    $this->sproject_location = $sproject_location_obj[0]->sproject_location;
    $this->ibc_id_fk = $sproject_location_obj[0]->ibc_id_fk;
    $this->idepartment_id_fk = $sproject_location_obj[0]->idepartment_id_fk;
}

// N_risk_quantum
if ($J_risk_probability_id_fk && $K_risk_consequence_id_fk && $L_duration_of_exposure_id_fk) {
    # code...
    $rProbability_obj = DB::table('risk_probabilities')->where('risk_probability_id','=',$J_risk_probability_id_fk)->get();
    $rConsequence_obj = DB::table('risk_consequences')->where('risk_consequence_id','=',$K_risk_consequence_id_fk)->get();
    $durationExp_obj = DB::table('duration_of_exposures')->where('duration_of_exposure_id','=',$L_duration_of_exposure_id_fk)->get();

    $this->N_risk_quantum = ($rProbability_obj[0]->risk_probability_value ? $rProbability_obj[0]->risk_probability_value : 1) *             ($rConsequence_obj[0]->risk_consequence_value ? $rConsequence_obj[0]->risk_consequence_value : 1 ) * ($durationExp_obj[0]->duration_of_exposure_value ? $durationExp_obj[0]->duration_of_exposure_value : 1 );

    $this->O_risk_acceptable_non_acceptable = $this->N_risk_quantum > 29 ? 'Note Acceptable' : 'Acceptable';
    $this->ifnotAcceptable = $this->N_risk_quantum > 29 ? true : false;
}

if ($R_risk_probability && $S_risk_consequence && $T_duration) {
    # code...
    $rProbability_obj = DB::table('risk_probabilities')->where('risk_probability_id','=',$R_risk_probability)->get();
    $rConsequence_obj = DB::table('risk_consequences')->where('risk_consequence_id','=',$S_risk_consequence)->get();
    $durationExp_obj = DB::table('duration_of_exposures')->where('duration_of_exposure_id','=',$T_duration)->get();

    $this->U_risk_quantum = ($rProbability_obj[0]->risk_probability_value ? $rProbability_obj[0]->risk_probability_value : 1) *             ($rConsequence_obj[0]->risk_consequence_value ? $rConsequence_obj[0]->risk_consequence_value : 1 ) * ($durationExp_obj[0]->duration_of_exposure_value ? $durationExp_obj[0]->duration_of_exposure_value : 1 );
    
    $this->V_risk_acceptable_non_acceptable = $this->U_risk_quantum > 29 ? 'Note Acceptable' : 'Acceptable';

}
@endphp

<div>
    @php $button_title = 'Add New Hira' @endphp
    @php $data_not_found = 'No Hira Data Found' @endphp


    <div class="row">
        <div class="col-sm-8">
            <div class="text-sm-left">
                <button class="btn btn-danger waves-effect waves-light mb-2" wire:click="OpenAddCountryModal()"> {{ $button_title }} </button>
                <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
            </div>
        </div>
        <div class="col-md-4">
            <input wire:model="searchQuery" type="text" placeholder="Search..." class="form-control" >
        </div>
    </div>


    <table class="table display table-bordered data-table text-center" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Project</th>
                <th>B_Activity</th>
                <th>C_Sub_Activity</th>
                <th>E_Potential_Hazard</th>
                <th>F_Probable_Consequence</th>
                <th>G_Causes</th>
                <th>I_Consequences_Controls</th>
                <th title="O_Risk_Acceptable_Non_Acceptable">O_Risk_Acbl_Non_Acbl</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $formdata01 as  $row )
                <tr>
                    <td>{{ $formdata01->firstItem()+$loop->index}}</td>
                    <td>{{ $row->sproject_name  }}</td>
                    <td>{{ $row->activity_description  }}</td>
                    <td>{{ $row->sub_activity_description  }}</td>
                    <td>{{ $row->potential_hazard_description  }}</td>
                    <td>{{ $row->probable_consequence_description  }}</td>
                    <td>{{ $row->causes_description  }}</td>
                    <td>{{ $row->consequences_controls_description  }}</td>
                    <td style="{{$row->O_risk_acceptable_non_acceptable == 'Note Acceptable' ? 'background: red;color: white;font-weight: 900;font-size: 1.1rem;' : 'background: green;color: white;font-weight: 900;font-size: 1.1rem;' }}">{{ $row->O_risk_acceptable_non_acceptable  }}</td>
                    <td>{{ Carbon\Carbon::parse($row->hiraCreate)->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->formdata_01s_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->formdata_01s_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="10">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($formdata01))
        {{ $formdata01->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.formdata01.add-modal')
    @include('Forms.Forms_01.formdata01.edit-modal')

</div>
