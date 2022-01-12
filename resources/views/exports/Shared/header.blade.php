<tr class="">
    {{-- {{dd($formHeader)}} --}}
     <td class="imgcon bdr1b" rowspan="3">
         {{-- <div class="imgdiv">
                       <img src="/img/largelogo.png" alt="loglarge">
                  </div> --}}
         <div class="imgdiv">
             @php
                 //     access the firt file in logo/large folder
                 $dir = public_path('storage/photos/logo/large/');
                 $fils = scandir($dir);
                 $firtFile = $fils;
                 //     dd(public_path("storage/photos/logo/large/".$fils[2]));
             @endphp
             {{-- img --}}
             {{-- <img src="{{Storage::url($defaultData->sbc_logo_small)}}" alt="loglarge"> <-- this code will work in production ... this is reletive path --}}
             <img src="{{ public_path('storage/photos/logo/large/' . $fils[2]) }}"
                 alt="loglarge">


         </div>
     </td>
     {{-- </tr> --}}
     {{-- <tr > --}}
     <td colspan="4" class="bdr1b">
         <strong>INTEGRATED MANAGEMENT SYSTEM </strong> (ISO 45001:2018 &#38; ISO
         14001:2015)
     </td>
 </tr>
 <tr>
     <td colspan="3" class="bdr1b">Doc. Name: <strong>{{$formHeader->document_name}}</strong></td>
     <td class="bdr1b">Doc. Code: <strong>{{$formHeader->document_code}}</strong></td>
 </tr>
 <tr class="">
     <td class="bdr1b">Issue No.: 01</td>
     <td class="bdr1b">Issue Date: 01.03.2020</td>
     <td class="bdr1b">Revision No: 00</td>
     <td class="bdr1b">Revision Date: 01.03.2020</td>
 </tr>