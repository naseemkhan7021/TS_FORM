<div class="modal fade dspLeadTimeLine " wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog " role="document" id="dspLeadTimeLine" style="height: 100vh;
    overflow-y: scroll;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Display Current Leads Activities</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="container">
                <form>
                    <div class="card-box border-black border-2">
                        <h4 class="text-dark header-title mb-2 pb-1 border-bottom border-success">Lead Activities • {{ $CustomerName }} </h4>
                            <div class="nicescroll p-20" >
                                <div class="timeline-2 d-flex flex-column flex-wrap justify-content-between">
                                    @forelse ( $leadfollowdata2 as  $row )
                                        {{-- {{ $leadId }} --}}
                                        {{-- @if ( $row->bactive2 != '0') --}}
                                        @if ($row->lead_id_FK == $leadId)
                                            <div class="" key={{ $row->iFollowUpID }}>
                                                <div class="time-item">
                                                    <div class="item-info">
                                                    <div class="text-muted d-inline"><small>Updated at {{ $row->updated_at }}</small></div> ○ <div class="text-muted d-inline"><small>Created at {{ $row->created_at }}</small></div>
                                                    <p>Next followUp date <strong>{{ $row->nextfollowup_dt }}</strong></p>
                                                    <p>User Name <strong><a href="#" class="text-info">{{ $row->full_name }}</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                                    <p>Staff Name <strong>{{ $row->name }}</strong></p>
                                                    <p>leadstatus_description <b>{{ $row->leadstatus_description }}</b></p>
                                                    <p>staff_description <b>{{ $row->leadstatus_description }}</b></p>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>


                                        @endif

                                    @empty
                                            <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
                                    @endforelse

                                </div>
                            </div>
                    </div>
                </form>

                <div class="form-group">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary btn-sm">Save</button> --}}
                </div>


            </div>



        </div>
    </div>
</div>
