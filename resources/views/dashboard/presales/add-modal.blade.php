<style>
    .modal-dialog #addLead {
        border: 2mm solid green;
        webkit-border-radius: 10px;
        moz-border-radius: 10px;
        border-radius: 10px;

    }


    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .amount_figure
    {
        text-align:right;
        color:red;
        font-weight: bolder;
    }

    .amount_figure_blue
    {
        text-align:right;
        color:blue;
        font-weight: bolder;
    }


</style>



@php
    setlocale(LC_MONETARY, "en_IN");
@endphp
{{-- modal-dialog-centered --}}

<div class="modal fade addDashboardPreSales " wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" id="addLead">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quote For General Based On  Agreement Value </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save" autocomplete="off">

                    <div class="row">

                        <div class="col-md-6">

                    <div class="form-group mb-0">
                        <div class="row">


                            <div class="col-md-6">
                                <label for="">Unit No</label>

                                <select wire:model.lazy="iID" class="form-control">
                                    <option value="0" hidden>NO UNIT SELECTED</option>
                                    @foreach($projectunits as $pju)
                                        <option value="{{ $pju->iID }}">{{ $pju->sManagementUnitID }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>


                            @php


                            $info2 = DB::table('projectunits')->join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
                            ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
                            ->join('projects' , 'projects.ProjectID' , '=' , 'projectunits.iProjectID_FK')
                            ->where('projectunits.bactive','1')
                            ->where('projectunits.iID' , '=' , $this->iID )
                            ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' , 'projects.*'  ]);


                            if($info2->isEmpty())
                            {
                            }
                            else {

                                foreach($info2 as $info) {
                                    $info     = get_object_vars($info);
                                    $upd_sManagementUnitID       = $info['sManagementUnitID'];
                                    $upd_projectname = $info['sProjectName'];
                                    $upd_sManagementUnitID = $info['sManagementUnitID'];
                                    $upd_salesunit_description = $info['salesunit_description'];


                                    $upd_iTotalCarpetArea_sqft =  $info['iTotalCarpetArea_sqft'];
                                    $upd_iMarketValue_sqmt = $info['iMarketValue_sqmt'];
                                    $upd_iAgreementValue = $info['iAgreementValue'];
                                    $upd_wingdescription =  $info['sWingDescription'];


                                    $upd_mParking =   number_format($info['mParking'],0);
                                    $upd_mClubHouse =  number_format($info['mClubHouse'],0);

                                    // $upd_iRate_sqft =  number_format($info2['iRate_sqft'],0);
                                    // $upd_mTotalFlatCost =  $info2['mTotalFlatCost'];
                                    // $upd_mGrandTotal = $info2['mGrandTotal'];
                                    $upd_mRegistration =  $info['mRegistration'];
                                    $upd_mStampDuty =   $info['mStampDuty'];

                                    // $upd_mFlatCost =  $info2['mFlatCost'];
                                    $upd_mDevelopmentCharges_amt =   $info['mDevelopmentCharges_amt'];
                                    $upd_mDevelopmentCharges =   $info['mDevelopmentCharges'];
                                    $upd_mClubHouse =   $info['mClubHouse'];
                                    $upd_GST =   $info['mGST'];
                                    $upd_iOtla_Area = $info['iOtla_Area'];
                                    $upd_iFloorRiseAmount = number_format($info['iFloorRiseAmount'],0);
                                    $upd_iTotalArea_sqft = $info['iTotalArea_sqft'];

                                }
                            }

                           @endphp



                            <br><br>


                            <table border="0" width=100%>
                                <thead>
                                <tr style="background-color:lightyellow;font-weight:bold;">
                                  <th>Sr.No.</th>
                                  <th style="text-align:center;"> <div> Description(s) </div> </th>
                                  <th style="text-align:center;"> <div> Data(s) </div> </th>
                                </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>Project Name</td>
                                        <td style="text-align:right;">{{  $upd_projectname }}</td>
                                    </tr>

                                    <tr>
                                        <td>02</td>
                                        <td>Unit No</td>
                                        <td class="amount_figure">{{  $upd_sManagementUnitID }}</td>
                                    </tr>


                                    <tr>
                                        <td>03</td>
                                        <td>Unit Type</td>
                                        <td style="text-align:right;">{{  $upd_salesunit_description }}</td>
                                    </tr>


                                    <tr>
                                        <td>04</td>
                                        <td>Wing</td>
                                        <td style="text-align:right;">{{  $upd_wingdescription }}</td>
                                    </tr>


                                    <tr>
                                        <td>05</td>
                                        <td>Agreement Value</td>
                                        {{-- <td style="text-align:right;"> {{ number_format($upd_iAgreementValue, 0)   }} </td> --}}
                                        <td style="text-align:right;" >{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", (int)$upd_iAgreementValue) }}</td>
                                    </tr>


                                    <tr>
                                        <td>06</td>
                                        <td>Market Value</td>
                                        {{-- <td style="text-align:right;">{{  number_format($upd_iMarketValue_sqmt,0) }}</td> --}}
                                        <td style="text-align:right;" >{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)$upd_iMarketValue_sqmt) }}</td>
                                    </tr>


                                    <tr>
                                        <td>07</td>
                                        <td>Floor</td>
                                        <td style="text-align:right;">{{  'Groud Floor' }}</td>
                                    </tr>

                                    <tr>
                                        <td>08</td>
                                        <td>Saleable Carpet Area</td>
                                        <td style="text-align:right;"> {{  number_format($upd_iTotalCarpetArea_sqft,0) }} {{ '-' }} {{  number_format($upd_iOtla_Area,0)  }}</td>
                                    </tr>


                                    <tr>
                                        <td>09</td>
                                        <td>Rate Per sq.ft.</td>
                                        {{-- input --}}
                                        {{-- <td style="text-align:right;">{{  $upd_iRate_sqft }}</td> --}}
                                        <td style="text-align:right;">
                                            <input style="text-align:right;width:35%;" wire:model.lazy="upd_iRate_sqft" type="text" placeholder="0" required>
                                            <span class="text-danger"> @error('upd_iRate_sqft') {{ $message }}@enderror</span>
                                        </td>
                                    </tr>


                                    <tr style="display:none;">
                                        <td style="display:none;">
                                            {{  $upd_iRate_sqft  }}
                                            {{  $upd_iTotalArea_sqft }}
                                            {{  $upd_mFlatCost = (int)($upd_iRate_sqft)  * (int)(number_format($upd_iTotalArea_sqft,0,"",""))  }}
                                            {{  $upd_mTotalFlatCost = (int)($upd_mFlatCost)  + (int)($upd_mDevelopmentCharges_amt) +  (int)($upd_mParking) +  (int)($upd_mClubHouse) + (int)($upd_mParking)  }}
                                            {{  $upd_mGrandTotal = (int)($upd_mTotalFlatCost)  + (int)($upd_GST) +  (int)($upd_mStampDuty) +  (int)($upd_mRegistration) }}

                                        </td>
                                    <tr>


                                    <tr>
                                        <td>10</td>
                                        <td>Floor Rise</td>
                                        <td style="text-align:right;">{{  $upd_iFloorRiseAmount }}</td>
                                    </tr>


                                    <tr>
                                        <td>11</td>
                                        <td>Unit Cost</td>
                                        {{-- input --}}
                                        {{-- <td style="text-align:right;">{{  number_format( (int)($upd_iRate_sqft)  * (int)(number_format($upd_iTotalArea_sqft,0,"","")),0)  }} </td> --}}
                                        {{-- <td class="amount_figure">{{  number_format($upd_mFlatCost,0)  }} </td> --}}
                                        <td class="amount_figure">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)$upd_mFlatCost) }}</td>


                                    </tr>

                                    <tr>
                                        <td>12</td>
                                        <td>Development Charges </td>
                                        {{-- <td style="text-align:right;">{{  number_format($upd_mDevelopmentCharges_amt,0) }}</td> --}}
                                        <td style="text-align:right;">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)$upd_mDevelopmentCharges_amt) }}</td>

                                    </tr>


                                    <tr>
                                        <td>13</td>
                                        <td>Parking ( 1 No)</td>
                                        <td style="text-align:right;">{{  $upd_mParking }}</td>
                                    </tr>



                                    <tr>
                                        <td>14</td>
                                        <td>Club Membership</td>
                                        <td style="text-align:right;">{{  number_format($upd_mClubHouse,0) }}</td>
                                    </tr>




                                    <tr>
                                        <td>15</td>
                                        <td>Lump Sum Flat Cost</td>
                                        {{-- <td class="amount_figure">{{  number_format($upd_mTotalFlatCost,0) }}</td> --}}
                                        <td class="amount_figure">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)$upd_mTotalFlatCost) }}</td>

                                    </tr>

                                    {{-- preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $num) --}}

                                    <tr>
                                        <td>16</td>
                                        <td>GST</td>
                                        {{-- <td style="text-align:right;">{{  number_format($upd_GST,0) }}</td> --}}
                                        <td style="text-align:right;">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)$upd_GST) }}</td>
                                    </tr>



                                    <tr>
                                        <td>17</td>
                                        <td>Stamp Duty (6%)</td>
                                        {{-- <td style="text-align:right;">{{  number_format($upd_mStampDuty,0) }}</td> --}}
                                        <td style="text-align:right;">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)$upd_mStampDuty) }}</td>
                                    </tr>


                                    <tr>
                                        <td>18</td>
                                        <td>Registration</td>
                                        {{-- <td style="text-align:right;">{{  number_format($upd_mRegistration,0) }}</td> --}}
                                        <td style="text-align:right;">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)$upd_mRegistration) }}</td>
                                    </tr>

                                    <tr>
                                        <td>19</td>
                                        <td>Total Unit Cost</td>
                                        {{-- <td class="amount_figure">{{  number_format($upd_mGrandTotal,0) }}</td> --}}
                                        <td class="amount_figure">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)$upd_mGrandTotal) }}</td>

                                    </tr>



                                </tbody>


                            </table>

                        </div>

                        <div class="col-md-6">



                            <div class="col-md-10">
                                <label for="">Select Template</label>
                                {{-- <input type="text" class="form-control" placeholder="Unit No" wire:model="iPurchased_unitID_FK"> --}}

                                <select wire:model.lazy="upd_template_id" class="form-control">
                                    <option value="0" hidden>TEMPLATE SELECTED</option>
                                    @foreach($paytemplate as $pt)
                                        <option value="{{ $pt->templatehead_ID }}">{{ $pt->stemplatedescription }}</option>
                                    @endforeach
                                </select>
                            </div>


                            @php

                            $payschdata = DB::table('payschtables')->get();

                            $paytemplatehead = DB::table('payment_template_heads')->where('bactive','1')
                                ->where('templatehead_ID','=' , $this->upd_template_id )
                                ->orderBy('templatehead_ID','asc')
                                ->get();

                            $paytemplatebody = DB::table('payment_template_bodies')->where('bactive','1')
                                ->where('templatehead_ID_FK','=' , $this->upd_template_id )
                                ->orderBy('id','asc')
                                ->get();


                            // echo $paytemplatehead;
                            // echo $paytemplatebody;


                            @endphp


                            <br><br>

                            <table border="0" width=100%>
                                <thead>
                                <tr style="background-color:lightgreen;font-weight:bold;">
                                  <th>Sr.No.</th>
                                  <th style="text-align:center;"><div>Payment Schedule(s) </div> </th>
                                  <th style="text-align:right;"> <div> Per% </div> </th>
                                  <th style="text-align:right;"> <div> Agreement </div></th>
                                  <th style="text-align:right;"> <div> Lump Sum </div></th>
                                </tr>
                                </thead>

                                <tbody id="tblBase">
                                    @forelse ( $paytemplatebody  as $psd )


                                    <tr>
                                        {{-- <td>{{  $psd->id }}</td>
                                        <td>{{  $psd->payment_schedule }} </td>
                                        <td>{{  $psd->per }} </td> --}}

                                        <td>{{  $psd->iLineID }}</td>
                                        <td>{{  $psd->sDescription }} </td>
                                        <td>{{  $psd->iPercentage }} </td>

                                        {{-- <td style="text-align:right;" >{{  ($upd_iAgreementValue * $psd->per / 100)  }}</td> --}}
                                        {{-- <td class="amount_figure_blue">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)($upd_iAgreementValue * $psd->per / 100) ) }}</td> --}}

                                        <td class="amount_figure_blue">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)($upd_iAgreementValue * $psd->iPercentage / 100) ) }}</td>
                                        <td class="amount_figure_blue">{{  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",  (int)($upd_mFlatCost * $psd->iPercentage / 100) ) }}</td>



                                    </tr>

                                    @empty

                                    @endforelse

                                </tbody>
                            </table>


                        </div>

                    </div>




                <br>

                {{-- https://www.youtube.com/watch?v=9qp0tUkPi54 --}}

                <div class="form-group">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button wire:click='AgreementExport' type="button" class="btn btn-primary btn-sm">Export</button>
                </div>

                                                                                                </form>

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


