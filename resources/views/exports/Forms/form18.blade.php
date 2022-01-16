<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>form18</title>
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
        table div{
            width: 100% !important;
        }

        #childeTable1 tbody {
            font-size: .995rem;
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
            margin-bottom: .5rem;
        }
        #tablData{
            width: 100% !important;
        }
        #tablData th,
        #tablData td {
            border: 1px solid black !important;
            /* text-align: center; */
        }
        #tablData th {
            padding: .4rem;
        }
        #tablData td{
            padding: .18rem;
        }

        #tablData,
        #tablData>tbody {
            font-size: .78rem !important;
            text-align: center;
        }

        #Heading1 {
            margin: 1rem 0 !important;
            font-size: .9rem !important;
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
    {{-- {{dd(Carbon\Carbon::parse($form18Data[0]->created_at)->format(env('')))}} --}}
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
                                                    <div >
                                                        <strong ><u id="Heading1">{{$formHeader->document_name}}</u></strong>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="">Project Name: 
                                                        <b class="border-dot">{{ $form18Data[0]->sproject_name }}</b>
                                                    </div>
                                                </td>

                                                <td colspan="2" align="right">
                                                    <div class="">Date/time: 
                                                        <b class="border-dot">{{ Carbon\Carbon::parse($form18Data[0]->created_at)->format(env('DATE_FORMAT2')) }}</b>
                                                    </div>
                                                </td>
                                                <td align="right">
                                                    <div class="">Month: 
                                                        <b class="border-dot">{{ Carbon\Carbon::parse($form18Data[0]->created_at)->format(env('M'))}}</b>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="5">
                                                    <table class="m0" id="tablData">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">Sr. No.</th>
                                                                <th rowspan="2">Extinguisher No.</th>
                                                                <th rowspan="2">Location</th>
                                                                <th rowspan="2">Type & Size</th>
                                                                <th colspan="2">Date of
                                                                    
                                                                </th>
                                                                <th rowspan="2">Pressure gauge / safety pin status</th>
                                                                <th rowspan="2">Seal Intact & not corroded</th>
                                                                <th rowspan="2">Name of Responsible Person</th>
                                                                <th colspan="2">Due for next</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Refilling</th>
                                                                <th>Inspection</th>
                                                                <th>Refilling</th>
                                                                <th>Inspection</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- {{dd($form18Data[0]->extinguisher_no)}} --}}

                                                            @php $totalData =  count($form18Data); @endphp
                                                            @foreach ($form18Data as $index => $item)
                                                            <tr>
                                                                <td>{{$index+1}}</td>
                                                                <td>{{$item->extinguisher_no}}</td>
                                                                <td>{{$item->location}}</td>
                                                                <td>{{$item->type}},{{$item->size}}</td>
                                                                <td>{{$item->date_of_refilling}}</td>{{--*- col span --}}
                                                                <td>{{$item->date_of_inspection}}</td>{{--*- col span --}}
                                                                <td>{{$item->pressure_gauge_or_safety_pin_status}}</td>
                                                                <td>{{$item->seal_intact_and_not_corroded}}</td>
                                                                <td>{{$item->name_of_responsible_person}}</td>
                                                                <td>{{$item->due_for_next_refilling}}</td>{{--*- col span --}}
                                                                <td>{{$item->due_for_next_inspection}}</td>{{--*- col span --}}
                                                            </tr>
                                                            @endforeach

                                                            @if ($totalData < 20)
                                                                @while ($totalData < 20)
                                                                <tr>
                                                                    <td>{{++$totalData}}</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                @endwhile
                                                            @endif
                                                            
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="5">
                                                    <div style="margin-top: .5rem;" class=""><strong>Inspected by:</strong>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="" colspan="3">
                                                    <div style="margin-top: .3rem;margin-bottom: .1rem" class="">Name & Sign. <b class="border-dot">{{ $form18Data[0]->inspected_by_name }} {{ $form18Data[0]->inspected_by_signature }}</b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div style="" class="">Designation: <b class="border-dot">{{ $form18Data[0]->inspected_by_designation }}</b></div>
                                                </td>
                                                <td>
                                                    <div style="" class="">Date: <b class="border-dot">{{ $form18Data[0]->inspected_by_date }}</b></div>
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
