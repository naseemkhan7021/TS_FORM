<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <style>
          body {
               font-family: sans-serif;
          }

          table {
               width: 100%;
               border-collapse: collapse;
          }

          .imgdiv {
               display: flex;
               justify-content: center;
          }

          .imgdiv img {
               object-fit: contain;
               width: 5rem;
               height: 5rem;
          }

          .imgcon {
               width: 6rem;
          }
     </style>
</head>

<body>
     <table border="1">
          <tbody align="center">
               <tr>
                    <td class="imgcon" rowspan="4">
                         <div class="imgdiv">
                              {{-- {{dd(public_path("storage/photos/logo/small/smalllogo_1641379051.png"))}} --}}
                              <img src="{{public_path("storage/photos/logo/small/smalllogo_1641379051.png")}}" alt="loglarge">
                              
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="4">
                         <strong>INTEGRATED MANAGEMENT SYSTEM </strong> (ISO 45001:2018 &#38; ISO 14001:2015)
                    </td>
               </tr>
               <tr>
                    <td colspan="3">Doc. Name: <strong>NEARMISS REPORTING FORMAT</strong></td>
                    <td>Doc. Code: <strong>EHS-F-15</strong></td>
               </tr>
               <tr>
                    <td>Issue No.: 01</td>
                    <td>Issue Date: 01.03.2020</td>
                    <td>Revision No: 00</td>
                    <td>Revision Date: 01.03.2020</td>
               </tr>
          </tbody>
     </table>
</body>

</html>