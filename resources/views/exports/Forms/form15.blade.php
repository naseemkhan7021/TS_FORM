<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>form15</title>
    <style>
        * {
            margin: 0;
            border: unset;
        }

        @page {
            margin: .5rem;
            display: flex;
            justify-content: center;
        }

        .bdr1b {
            border: 1px solid black;
        }

        body {
            font-family: sans-serif;
            margin: .5rem;
            display: flex;
            justify-content: center;

            /* display: grid; */
            /* align-items: center; */
            /* justify-self: center; */
        }

        #parant {
            border: 1px solid black !important;
            margin: auto;
        }

        #parant table {
            /* margin: .5rem; */

            /* margin: 1rem auto; */
            margin: 1rem auto 0.7rem auto;
        }

        table {
            width: 98%;
            border-collapse: collapse;
            /* border: 1px solid black; */
            border: none;
        }

        #childeTable1 tbody {
            font-size: .9rem;
        }

        #childeTable2 {
            width: 100%;
            border: none;
            margin: 0;
            /* margin-top: 1rem; */
        }

        #childeTable2 tbody {
            font-size: .72rem !important;
        }

        #childeTable2 tr td div {
            display: inline-block;
            margin-bottom: .4rem;
        }

        #Heading1 {
            margin-bottom: 1rem;
        }

        .imgdiv {
            display: flex;
            justify-content: center;
        }

        .imgdiv img {
            object-fit: contain;
            width: 100%;
            /* height: 100%; */
        }

        .imgcon {
            width: 5rem;
            height: 3rem;
            padding: 0 .8rem;
        }

        .m-l1 {
            margin-left: 1rem;
        }

        .lihit14 {
            line-height: 1.4;
        }
        .border-dot{
             border-bottom: 1px solid black dotted;
        }
        .selected-OPT{
            color: red;
        }
        .footer{
            border-top: 1px solid black !important;
            font-size: .6rem;
        }

    </style>
</head>

<body>
    <table id="parant">
        {{-- {{ dd($formData,$defaultData) }} --}}
        {{-- {{ dd($NatureofpotentialData,isset(explode(',',$formData->nature_of_potential_injuries_ids)[0]) ? 'ok' : 'nothere') }} --}}
        {{-- {{ dd(in_array('1',explode(',',$formData->nature_of_potential_injuries_ids))) }} --}}
        <tbody>
            <tr>
                <td colspan="2">
                    <table id="childeTable1" style="margin-bottom: 0px">
                        <tbody align="center">
                           @include('exports.Shared.header')

                            <tr>
                                <td colspan="5">
                                    <table id="childeTable2">
                                        <tbody>
                                            <tr align="center">
                                                <td id="Heading1" colspan="5">
                                                    <strong style="font-size: .95rem"><u>NEARMISS REPORTING
                                                            FORMAT</u></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="">Project Name: <b class="border-dot">{{$formData->sproject_name}}</b>
                                                    </div>
                                                </td>

                                                <td colspan="2" align="right">
                                                    <div class="">Report no.: <b class="border-dot">{{$formData->report_no}}</b></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <div class=""> Location: <b class="border-dot">{{$formData->sproject_location}}</b></div>
                                                </td>
                                                <td colspan="2" align="right">
                                                    <div class="">Date/time: <b class="border-dot">{{$formData->doincident_dt}}</b></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class=""><strong>Potential Injury:</div>
                                                </td>
                                                @foreach ($potentialinjurytotData as $item)
                                                    <td>{!! $item->potential_injurytos_id == $formData->potential_injurytos_fk ? '&bull; <span class="selected-OPT">'.$item->potential_injurytos_description.'</span> ' : '&ordm; '.$item->potential_injurytos_description !!} 
                                                        {!! $item->potential_injurytos_abbr == 'OT' ? '<b class="border-dot">'. $formData->potential_injurytos_other.'</b>' : '' !!}</td>
                                                @endforeach
                                                {{-- <td>
                                                     <div class=""><b>{{$formData->potential_injurytos_other}}</b></div>
                                                </td> --}}
                                                <td align="right">
                                                    <div style="margin: 0;" class="">Company Name:<b class="border-dot">{{$formData->sbc_company_name}}</b></div>
                                                </td>
                                            </tr>
                                            <!-- Nature of Potential Injury: ( Tick &check; in the Boxes ) -->
                                            <tr>
                                                <td colspan="5">
                                                    <div class=""><strong>Nature of Potential
                                                            Injury:</strong> <span>(Tick &bull; in the Boxes)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                @foreach ($NatureofpotentialData as $index => $item)
                                                {{-- @if (isset(explode(',',$formData->nature_of_potential_injuries_ids)[$index]) && in_array($item->nature_of_potential_injuries_id,explode(',',$formData->nature_of_potential_injuries_ids)) $item->nature_of_potential_injuries_id == explode(',',$formData->nature_of_potential_injuries_ids)[$index])
                                                {{dd('match')}}
                                                    
                                                @endif --}}
                                                    <td>
                                                        <div class="m-l1">
                                                            {!! in_array($item->nature_of_potential_injuries_id,explode(',',$formData->nature_of_potential_injuries_ids))  ? '&bull; <span class="selected-OPT">'.$item->nature_of_potential_injuries_description .'</span> ' : '&ordm; '.$item->nature_of_potential_injuries_description !!}
                                                            
                                                        </div>
                                                    </td>
                                                    @if ($index == 2)
                                                    @break
                                                @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($NatureofpotentialData as $index => $item)
                                                    @if ($index == 3 || $index == 4))
                                                        <td>
                                                            <div class="m-l1">
                                                                {!! in_array($item->nature_of_potential_injuries_id,explode(',',$formData->nature_of_potential_injuries_ids))  ? '&bull; <span class="selected-OPT">'.$item->nature_of_potential_injuries_description .'</span> ' : '&ordm; '.$item->nature_of_potential_injuries_description !!}
                                                            </div>
                                                        </td>
                                                    @endif
                                                    

                                                @endforeach
                                                <td colspan="3">
                                                    <div class="m-l1">Details if required: <b class="border-dot">{{$formData->nature_of_potential_injuries_other}}</b></div>
                                                </td>
                                            </tr>
                                            <!-- Activity: ( Tick <span class="selected-OPT">&bull; </span> in the Boxes ) -->
                                            <tr>
                                                <td colspan="5">
                                                    <div class=""><strong>Activity:</strong> <span>( Tick &bull; in the Boxes )</span></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                @foreach ($activityData as $index => $item)
                                                    <td>
                                                        <div class="m-l1">
                                                             {!! in_array($item->activity15s_id,explode(',',$formData->activity15s_ids))  ? '&bull; <span class="selected-OPT">'.$item->activity15s_description .'</span> ' : '&ordm; '.$item->activity15s_description  !!}
                                                            {{-- {{ $item->activity15s_description }} --}}
                                                        </div>
                                                    </td>
                                                    @if ($index == 3)
                                                    @break
                                                @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($activityData as $index => $item)
                                                    @if ($index == 4 || $index == 5 || $index == 6 || $index == 7)
                                                    <td>
                                                       <div class="m-l1">
                                                        {!! in_array($item->activity15s_id,explode(',',$formData->activity15s_ids))  ? '&bull; <span class="selected-OPT">'.$item->activity15s_description .'</span> ' : '&ordm; '.$item->activity15s_description  !!}
                                                       </div>
                                                   </td>
                                                    @endif
                                                    

                                                @endforeach
                                            </tr>

                                            <tr>
                                                <td colspan="5">
                                                    <div class=""><strong>Details of Nearmiss:</strong>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    {{-- <div class="lihit14">Lorem ipsum dolor sit, amet consectetur
                                                        adipisicing elit. Ullam doloribus similique harum blanditiis
                                                        nemo, rem dignissimos, officiis sint eius non velit possimus
                                                        nostrum deserunt corporis, iste modi? Laboriosam optio iste
                                                        dicta possimus recusandae neque pariatur necessitatibus beatae
                                                        odit cupiditate! Fugiat tempora iusto nihil corrupti quod
                                                        necessitatibus eligendi perferendis, nisi sequi est unde
                                                        laboriosam autem in ducimus excepturi iure odit nemo! Ullam
                                                        accusantium voluptatum, tempore est dolorum et modi harum,
                                                        consequatur ea eveniet fugit cumque fugiat quam. Omnis laborum
                                                        sequi quisquam, animi hic harum quos ipsam excepturi nobis
                                                        ratione dolore consequatur dolorem reprehenderit labore
                                                        laudantium. Maiores eaque sequi et cum qui,.</div> --}}
                                                        <div class="lihit14"><b class="border-dot"> {{ $formData->details_of_nearmiss ?? '.....................'}}</b></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="5">
                                                    <div style="width: 100%" class="">
                                                        <strong>Cause:</strong> <span>( Tick &bull; in the Boxes
                                                            )</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" align="center">
                                                    <div><strong>Immediate Cause:</strong></div>
                                                </td>
                                                <td colspan="2" align="center">
                                                    <div>
                                                        <strong>Contributing Cause:</strong>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <table style="margin: 0;">
                                                        <tbody>
                                                            @foreach ($imdcauseData as $index => $item)
                                                                <tr>
                                                                    <td>
                                                                        <div style="display: block;"
                                                                            class="">
                                                                            {{-- &ordm; {{ $item->cause15s_description }} --}}
                                                                            {!! in_array($item->cause15s_id,explode(',',$formData->imdcause15s_ids))  ? '&bull; <span class="selected-OPT">'.$item->cause15s_description.'</span> ' : '&ordm; '.$item->cause15s_description !!}
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td>
                                                                    <div class="lihit14">detail : <b class="border-dot">{{$formData->imdcause15s_other}}</b>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td></td>
                                                <td colspan="3">
                                                    <table style="margin: 0; transform: translate(10px, -20px);">
                                                        <tbody>
                                                            @foreach ($contributcauseData as $index => $item)

                                                                <tr>
                                                                    <td>
                                                                        <div style="display: block;"
                                                                            class="">
                                                                            {{-- &ordm; {{ $item->contributing_causes_description }} --}}
                                                                            {!! in_array($item->contributing_causes_id,explode(',',$formData->contributing_causes_ids))  ? '&bull; <span class="selected-OPT">'.$item->contributing_causes_description.'</span> ' : '&ordm; '.$item->contributing_causes_description !!}
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                            <tr>
                                                                <td>
                                                                    <div class="lihit14">detail : <b class="border-dot">{{$formData->contributing_causes_other}}</b>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            
                                            <!-- Why was the unsafe act committed: : ( Tick <span class="selected-OPT">&bull; </span> in the Boxes ) -->
                                            <tr>
                                                <td colspan="5">
                                                    <div class=""><strong>Why was the unsafe act
                                                            committed:</strong> <span>( Tick &bull; in the Boxes
                                                            )</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                @foreach ($whyunsafeactcommittedsData as $index => $item)
                                                    <td {{$index != 2 ? "colspan=2" : ''}}>
                                                        <div style="width: 100%" class="m-l1">
                                                            {{-- &ordm; {{ $item->whyunsafeact_committeds_description }} --}}
                                                            {!! in_array($item->whyunsafeact_committeds_id,explode(',',$formData->whyunsafeact_committeds_ids))  ? '&bull; <span class="selected-OPT">'.$item->whyunsafeact_committeds_description.'</span> ' : '&ordm; '.$item->whyunsafeact_committeds_description !!}
                                                        </div>
                                                    </td>
                                                    @if ($index == 2)
                                                    @break
                                                @endif
                                                @endforeach
                                                {{-- <td colspan="2">
                                                    <div class="m-l1">&ordm; Equipment damage</div>
                                                </td>
                                                <td align="center">
                                                    <div class="m-l1">&ordm; Personal Injury</div>
                                                </td>
                                                <td colspan="2" align="center">
                                                    <div class="m-l1">&ordm; Fire / Explosion</div>
                                                </td> --}}
                                            </tr>
                                            <tr>
                                                {{-- <td colspan="2">
                                                    <div class="m-l1">&ordm; Other</div>
                                                </td> --}}
                                                @foreach ($whyunsafeactcommittedsData as $index => $item)
                                                    @if ($index == 3)
                                                        <td>
                                                            <div class="m-l1" style="width: 100%">
                                                                 {{-- &ordm; {{ $item->whyunsafeact_committeds_description }} --}}
                                                                 {!! in_array($item->whyunsafeact_committeds_id,explode(',',$formData->whyunsafeact_committeds_ids))  ? '&bull; <span class="selected-OPT">'.$item->whyunsafeact_committeds_description.'</span> ' : '&ordm; '.$item->whyunsafeact_committeds_description !!}
                                                            </div>
                                                        </td>
                                                    @endif
                                                @endforeach
                                                <td colspan="3" align="center">
                                                    <div class="m-l1">Details if required:  <b class="border-dot">{{$formData->whyunsafeact_committeds_other ?? '______________'}}</b></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="5">
                                                    <div style="width: 100%" class=""><strong>Immediate
                                                            Corrective Action to be taken:</strong> <span>( Tick &bull; in the Boxes )</span></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" align="center">
                                                    <div><strong>Action:</strong></div>
                                                </td>
                                                <td></td>
                                                <td colspan="2" align="center">
                                                    <div>
                                                        <strong>Correction:</strong>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <table style="margin: 0;">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">
                                                                    @foreach ($imdactionData as $index => $item)
                                                                        <div style="display: block;"
                                                                            class="">
                                                                            {{-- &ordm; {{ $item->imd_actions_description }} --}}
                                                                            {!! in_array($item->imd_actions_id,explode(',',$formData->imd_actions_ids))  ? '&bull; <span class="selected-OPT">'.$item->imd_actions_description.'</span> ' : '&ordm; '.$item->imd_actions_description !!}
                                                                        </div>
                                                                    @endforeach

                                                                </td>
                                                                <td></td>
                                                                <td colspan="2">
                                                                    @foreach ($imdcorrectionData as $index => $item)
                                                                        <div style="display: block;"
                                                                            class="">
                                                                            {{-- &ordm; {{ $item->imd_corrections_description }} --}}
                                                                            {!! in_array($item->imd_corrections_id,explode(',',$formData->imd_corrections_ids))  ? '&bull; <span class="selected-OPT">'.$item->imd_corrections_description.'</span> ' : '&ordm; '.$item->imd_corrections_description !!}
                                                                        </div>
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td colspan="5">
                                                    <div class=""><strong>Further recommended
                                                            action:</strong></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    {{-- <div class="lihit14">Lorem ipsum dolor sit, amet consectetur
                                                        adipisicing elit. Ullam doloribus similique harum blanditiis
                                                        nemo, rem dignissimos, officiis sint eius non velit possimus
                                                        nostrum deserunt corporis, iste modi? Laboriosam optio iste
                                                        dicta possimus recusandae neque pariatur necessitatibus beatae
                                                        odit cupiditate! Fugiat tempora iusto nihil corrupti quod
                                                        necessitatibus eligendi perferendis.</div> --}}
                                                    <div class="lihit14"><b class="border-dot"> {{ $formData->further_recommended_action ?? '.....................'}}</b></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="" colspan="3">
                                                    <div style="width: 100%" class="">Completed by - Name: <b class="border-dot"> {{ $formData->completed_by_name ?? '____________________________'}}</b></div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="">Signature: <b class="border-dot">{{$formData->completed_by_signature == 1 ? 'signed' : '________' }}</b> Date: <b class="border-dot">{{ $formData->completed_date ?? '__/__/__'}}</b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <div class=""><strong>CC to: GM / PM / Corporate EHS
                                                            Department</strong></div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @include('exports.Shared.footer')
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
