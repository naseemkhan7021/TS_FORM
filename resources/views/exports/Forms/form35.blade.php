<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>form35</title>
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
                                                    <strong ><u id="Heading1">{{$formHeader->document_name}}</u></strong>
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
