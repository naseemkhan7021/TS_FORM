<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>form35</title>
    <style>
        * {
            margin: 0;
            border: unset;
            padding: 0;
            line-height: 1.18;
        }

        @page {
            margin: 0px;
            margin-top: .5rem !important;
            display: flex;
            justify-content: center;
        }

        .bdr1b {
            border: 1px solid black;
        }

        body {
            font-family: sans-serif;
            margin: 0px;
            margin-top: .5rem !important;
            /* margin: .5rem; */
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
            font-size: .98rem;
        }

        table#childeTable2 td {
            border: 1px solid black !important;

        }



        #participantsTbl th,
        #participantsTbl td {
            border: 1px solid black !important;
            /* text-align: center; */
        }

        #participantsTbl,
        #participantsTbl>tbody {
            font-size: 1rem !important;
            text-align: center;
        }

        #Heading1 {
            margin: 1rem 0 !important;
            font-size: .9rem !important;
        }

        td div {
            padding: .1rem .2rem;
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

        .border-dot {
            border-bottom: 1px black dotted;
        }

        .selected-OPT {
            color: red;
        }

        .footer {
            border-top: 1px solid black !important;
            font-size: .6rem;
        }

        .m0 {
            margin: 0 !important;
        }

        .wd100 {
            width: 100% !important;
        }

        .mx2 {
            width: 20%;
        }

        table#checkpointTable,
        table#checkpointTable table {
            margin: 0 !important;
            width: 100%;
        }

        table#childeTable2 table#checkpointTable td,
        table#childeTable2 table#checkpointTable th {
            /* border: 1px solid black !important; */
            border: none !important;
        }

        table#childeTable2 table#checkpointTable td,
        table#childeTable2 table#checkpointTable th {
            /* border: 1px solid black !important; */
            border-right: 1px solid !important;
        }

        table#childeTable2 table#checkpointTable td:last-child,
        table#childeTable2 table#checkpointTable th:last-child {
            /* border: 1px solid black !important; */
            border-right: unset !important;
        }

        table#childeTable2 table#checkpointTable table td {
            /* border: 1px solid black !important; */
            border-top: 1px dotted !important;
        }

        table#childeTable2 table#checkpointTable table td {
            text-align: center;
        }

        /* table#childeTable2 table#checkpointTable table td:first-child {
            text-align: start;
        } */


        table#childeTable2 table#checkpointTable table th {
            /* border: 1px solid black !important; */
            border-bottom: 1px solid !important;
        }

        /* signature area  */
        table#childeTable2 table td {
            /* border: 1px solid black !important; */
            border: none !important;
        }

        table#childeTable2 table td {
            /* border: 1px solid black !important; */
            border-right: 1px solid !important;
        }

        table#childeTable2 table td:last-child {
            /* border: 1px solid black !important; */
            border-right: unset !important;
        }

        .singA {
            margin-top: 2rem;
        }

        .border-b {
            border-bottom: 1px solid !important;
        }

        .d-inlineB {
            display: inline-block;
        }

    </style>
</head>

<body>
    {{-- {{     dd( isset($formData->form35_checkpoint_remarks[0])) }} --}}
    {{-- {{dd($formData->form35_checkpoint_remarks[0] ?? '')}} --}}
    {{-- {{dd($headerData,$partisipanceData,$topicData)}} --}}
    {{-- {{dd(count(explode(',',$partisipanceData->id_no)))}} --}}
    <table id="parant">
        <tbody>
            <tr>
                <td colspan="2">
                    <table id="childeTable1" style="margin-bottom: 0px">
                        <tbody align="center">
                            @include('exports.Shared.header')

                            <tr>
                                <td colspan="5">
                                    <table id="childeTable2" style="width: 100%;">
                                        <tbody>
                                            <tr align="center">
                                                <td colspan="" class="mx2">
                                                    <div class="">Date: <b
                                                            class="border-dot">{{ Carbon\Carbon::parse($formData->created_at)->format(env('DATE_FORMAT_YMD')) }}</b>
                                                    </div>
                                                </td>
                                                <td colspan="3">
                                                    <div class="">
                                                        <strong><u
                                                                id="Heading1">{{ $formHeader->document_name }}</u></strong>
                                                        <br><small>(Note: Issue for works of periphery & height
                                                            work)</small>
                                                    </div>
                                                </td>
                                                <td colspan="" class="mx2">
                                                    <div class="">Permit No.: {{ $formData->parmitNo }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="">Date of Working:
                                                        {{ $formData->working_dt }}</div>
                                                </td>
                                                <td colspan="3">
                                                    <div class="">Time of working: <b
                                                            class="border-dot">{{ Carbon\Carbon::parse($formData->working_t_F)->format(env('HIA')) }}</b> To
                                                        <b class="border-dot">{{ Carbon\Carbon::parse($formData->working_t_T)->format(env('HIA')) }}</b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <div class="">
                                                        Exact Location and nature of work to be carried out:
                                                        @foreach ($activity as $index => $item)
                                                            <b class="border-dot">{{ $item->activity_description }}</b>,
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="">Name of Contractor: <b class="border-dot">{{$formData->contractor_name}}</b>
                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="">Name of Supervisor: <b class="border-dot">{{$formData->supervisor_name}}</b>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="">No. of people working: <b class="border-dot">{{$formData->no_of_people_working}}</b></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" align="left">
                                                    <div class="">
                                                        <span>To carry out work, the following points are to be
                                                            checked:</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--  check point area -->
                                            <tr>
                                                <td colspan="5">
                                                    <table id="checkpointTable">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Checkpoints</th>
                                                                                <th>Y/N</th>
                                                                                <th>Remark</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($checkpointData as $index => $item)
                                                                                <tr>
                                                                                    <td style="text-align: start !important;">
                                                                                        <div class="" style="font-size: .9rem !important;">
                                                                                            {{ $item->form35_checkpoints_desc }}
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="">
                                                                                            {!! in_array($item->form35_checkpoints_id,$formData->form35_checkpoint_ids) ? '<b class="border-dot">YES</b>' : 'NO' !!}
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="">
                                                                                            {{-- this is string truncat --}}
                                                                                            {!! isset($formData->form35_checkpoint_remarks[$index]) ? Str::limit($formData->form35_checkpoint_remarks[$index], 8, $end='...') :  '' !!}
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                @if ($index == 6)
                                                                                @break
                                                                            @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td>
                                                                    <table>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Checkpoints</th>
                                                                                <th>Y/N</th>
                                                                                <th>Remark</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($checkpointData as $index => $item)
                                                                                @if ($index >= 7)
                                                                                    <tr>
                                                                                        <td style="text-align: start !important;">
                                                                                            <div class="" style="font-size: .9rem !important;">
                                                                                                {{ $item->form35_checkpoints_desc }}
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="">
                                                                                                {!! in_array($item->form35_checkpoints_id,$formData->form35_checkpoint_ids) ? '<b class="border-dot">YES</b>' : 'NO' !!}
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="">
                                                                                                {{-- this is string truncat --}}
                                                                                                {!! isset($formData->form35_checkpoint_remarks[$index]) ? Str::limit($formData->form35_checkpoint_remarks[$index], 8, $end='...') : '' !!}
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="5">
                                                    <div class=""><b>Special Instruction and restrictions,
                                                            if any:
                                                            Before issuing this permit ensure the relevant checklist has
                                                            been filled and submitted to site EHS department
                                                            (EHS-F-35)</b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- signature area -->
                                            <tr>
                                                <td colspan="5">
                                                    <table class="m0 wd100">
                                                        <tbody>
                                                            <tr align="center">
                                                                <td>
                                                                    <div class="">
                                                                        <p>All the above checkpoints found OK. Permit is
                                                                            issued to carry out the required Height work
                                                                        </p>
                                                                        <div class="singA">
                                                                            <span>_____________________</span>
                                                                        </div>
                                                                        <span>
                                                                            Name & Sign. of Permit Issuing Authority
                                                                            <br>
                                                                            <small>
                                                                                (Area Incharge / Engineer / Manager)
                                                                            </small>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <p>I understood the Safety Requirements of the
                                                                            job and shall follow without fail</p>
                                                                        <div class="singA">
                                                                            <span>_____________________</span>
                                                                        </div>
                                                                        <span>
                                                                            Name & Sign. of Permit Receiver / Holder
                                                                            <br>
                                                                            <small>
                                                                                (Supervisor / Responsible person)
                                                                            </small>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <p>All the checkpoints are verified and found
                                                                            OK. Work can be started.</p>
                                                                        <div class="singA">
                                                                            <span>_____________________</span>
                                                                        </div>
                                                                        <span>
                                                                            (Name & Signature of Safety representative)
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <table class="wd100 m0">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="">
                                                                        <p class="border-dot">To be filled in by
                                                                            Permit
                                                                            Receiver on completion of work and returned
                                                                            to Safety Department:</p>
                                                                        <p>I have checked & certify the work completion.
                                                                            All the men and materials withdrawn</p>
                                                                        <div class="singA" align="center">
                                                                            <span>_____________________</span><br>
                                                                            <span>(Name & Signature of Permit Issuing
                                                                                Authority / Holder)</span>
                                                                        </div>
                                                                        <small>Date:__/__/____</small>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <p class="border-dot">To be filled in by
                                                                            Permit
                                                                            Receiver on completion of work and returned
                                                                            to Safety Department:</p>
                                                                        <p>I have checked & certify the work completion.
                                                                            All the men and materials withdrawn</p>
                                                                        <div class="singA" align="center">
                                                                            <span>_____________________</span><br>
                                                                            <span>(Name & Signature of Permit Issuing
                                                                                Authority / Holder)</span>
                                                                        </div>
                                                                        <small>Date:__/__/____</small>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <div class="">
                                                        <div class="">
                                                            <span>Note:</span>
                                                            <div class="d-inlineB" style="margin-left: 2rem;">
                                                                <p class="d-inlineB">01) Ensure all labours / men’s
                                                                    working at height is
                                                                    trained for the same & tool box training should be
                                                                    conducted prior to work.</p>
                                                                <br>
                                                                <p class="d-inlineB">02) "Understand work - Ensure
                                                                    Safety" before commencing
                                                                    work.</p>
                                                                <br>
                                                                <p class="d-inlineB">03) The above permit is valid
                                                                    for
                                                                    the day only. Permit
                                                                    may be carried forward with the permission of the
                                                                    Issuing authority for the next day only.</p>
                                                            </div>
                                                        </div>
                                                        <div class="" style="margin-top: 1rem;">Name &
                                                            Signature of Site Safety Officer: _____________________
                                                        </div>
                                                        <div class="" style="margin-top: .5rem;">
                                                            <p>
                                                                Note: For continuation of permit, please notify
                                                                authorized person 1 hour before expiry of permit.
                                                            </p>
                                                        </div>
                                                    </div>
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
