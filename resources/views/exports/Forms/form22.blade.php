<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>form22</title>
    <style>
        * {
            margin: 0;
            border: unset;
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
            width: 100%;
            margin-bottom: .5rem;
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
            font-size: 2rem;
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
            border-bottom: 1px solid black dotted;
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

    </style>
</head>

<body>
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
                                    <table id="childeTable2">
                                        <tbody>
                                            <tr align="center">
                                                <td colspan="5">
                                                    <strong id="Heading1"><u>EH&S INDUCTION</u></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="">Project Name: <b
                                                            class="border-dot">{{ $headerData->sproject_name }}</b>
                                                    </div>
                                                </td>

                                                <td colspan="2" align="right">
                                                    <div class="">Date/time: <b
                                                            class="border-dot">{{ $headerData->ehsind_dt }}</b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <div class=""> Name of Contractor: <b
                                                            class="border-dot">{{ $headerData->contractor_name }}</b>
                                                    </div>
                                                </td>
                                                <td colspan="2" align="right">
                                                    <div class=""> Venue: <b
                                                            class="border-dot">{{ $headerData->venue }}</b></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <div class=""> Faculty: <b
                                                            class="border-dot">{{ $headerData->faculty_name }}</b>
                                                    </div>
                                                </td>
                                                <td colspan="2" align="right">
                                                    <div class=""> Duration: <b
                                                            class="border-dot">{{ $headerData->duration }}</b>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Nature of Potential Injury: ( Tick &check; in the Boxes ) -->
                                            <tr>
                                                <td colspan="5">
                                                    <div class="" style="margin-top: 2rem">
                                                        <strong>Undertaking:</strong>
                                                        <span>(Tick &bull; in the Boxes)</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="5">
                                                    <div class="lihit14">I, the undersigned, have attended the
                                                        EHS
                                                        Induction Training and understood the requirements of following
                                                        Health & Safety rules in work place and agreed to follow them.
                                                        My signature is appended below.
                                                        The following Staff / Technicians / Contractor / Labour have
                                                        joined and commenced work at site. They have been imparted EHS
                                                        Induction Training. The Points covered in the training are:
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Activity: ( Tick ✓ in the Boxes ) -->
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <div class=""><strong>Topics Discussed:</strong>
                                                        <span>( Tick &bull; in the Boxes )</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <table style="margin: 0;">
                                                        <tbody>
                                                            @foreach ($topicData as $index => $item)
                                                                <tr>
                                                                    <td>
                                                                        <div style="display: block;"
                                                                            class="">
                                                                            {{-- {{ $item->topic_discusseds_description }} --}}
                                                                            {!! in_array($item->topic_discusseds_id, explode(',', $headerData->topic_discusseds_ids)) ? '&bull; <span class="selected-OPT">' . $item->topic_discusseds_description . '</span> ' : '&ordm; ' . $item->topic_discusseds_description !!}
                                                                            {{-- topic_discusseds_ids  topic_discusseds_id --}}
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
                                                <td></td>
                                                <td colspan="3">
                                                    <table style="margin: 0;">
                                                        <tbody>
                                                            @foreach ($topicData as $index => $item)
                                                                @if ($index >= 7)
                                                                    <tr>
                                                                        <td>
                                                                            <div style="display: block;"
                                                                                class="">
                                                                                {!! in_array($item->topic_discusseds_id, explode(',', $headerData->topic_discusseds_ids)) ? '&bull; <span class="selected-OPT">' . $item->topic_discusseds_description . '</span> ' : '&ordm; ' . $item->topic_discusseds_description !!}
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                {{-- @if ($index = 13)
                                                                @break
                                                            @endif --}}
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="center" colspan="5">
                                                    <div id="Heading1" class="">
                                                        <strong>PARTICIPANTS</strong>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="5">
                                                    <table class="m0" id="participantsTbl">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No</th>
                                                                <th>ID No.</th>
                                                                <th>Name of the Participants</th>
                                                                <th>Age</th>
                                                                <th>Designation</th>
                                                                <th>Signature</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $totalParticipance =  count(explode(',',$partisipanceData->id_no)); @endphp
                                                            @foreach (range(0, $totalParticipance - 1) as $item)
                                                                <tr>
                                                                    <td>{{ $item + 1 }}</td>
                                                                    <td>{{ explode(',', $partisipanceData->id_no)[$item] }}
                                                                    </td>
                                                                    <td>{{ explode(',', $partisipanceData->participant_name)[$item] }}
                                                                    </td>
                                                                    <td>{{ explode(',', $partisipanceData->age)[$item] }}
                                                                    </td>
                                                                    <td>{{ explode(',', $partisipanceData->desgination)[$item] }}
                                                                    </td>
                                                                    <td>{{ $partisipanceData->signature }}</td>
                                                                </tr>
                                                            @endforeach
                                                            {{-- if you don't want blank row then remov below (if) algo --}}
                                                            @if ($totalParticipance < 15))
                                                                @while ($totalParticipance < 15)
                                                                    <tr>
                                                                        <td>{{ ++$totalParticipance }}</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    {{-- @php $totalParticipance++ @endphp --}}
                                                                    {{-- {{ dd($totalParticipance) }} --}}
                                                                @endwhile
                                                            @endif

                                                        </tbody>

                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="" colspan="3">
                                                    <div style="margin-top: 2rem;" class="">Signature of
                                                        the Faculty: <b
                                                            class="border-dot">{{ $headerData->faculty_sign }}</b>
                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <div style="margin-top: 2rem;" class="">Name & Sign.
                                                        Of Site Safety In charge: <b
                                                            class="border-dot">{{ $headerData->site_safety_in_charge_name }}
                                                            {{ $headerData->site_safety_in_charge_sign }}</b></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <div class=""><strong> RECORD REFERENCE:</strong>
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
