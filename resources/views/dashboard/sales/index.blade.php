@extends('template.vertical', ['title' => 'Construction CRM - Channel Partner'])

@section('css')

<style>
    .flex-container {
      display: flex;
      /*flex-wrap: wrap;*/
      flex-wrap: wrap;
      /* background-color: #d8d8d8; */
    }

    .flex-container>div {
      background-color: #f1f1f1;
      width: 70px;
      margin: 10px;
      text-align: center;
      line-height: 70px;
      font-size: 16px;
      border-top-left-radius: 50px;
      border-top-right-radius: 50px;
      border-bottom-left-radius: 50px;
      border-bottom-right-radius: 50px;
      border: 4px solid green;
    }


    .flex-sold {
      background-color: #818181;
      width: 70px;
      margin: 10px;
      text-align: center;
      line-height: 70px;
      font-size: 16px;
      border-top-left-radius: -25px;
      border-top-right-radius: -25px;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
      border: 4px solid red;
    }



    .flex-container3 {
      display: flex;
      /*flex-wrap: wrap;*/
      flex-wrap: wrap;
      /* background-color: lightblue; */
    }

    .flex-container3>div {
      background-color: #f1f1f1;
      width: 70px;
      margin: 10px;
      text-align: center;
      line-height: 70px;
      font-size: 16px;
      border-top-left-radius: 50px;
      border-top-right-radius: 50px;
      border-bottom-left-radius: -50px;
      border-bottom-right-radius: -50px;
      border: 4px solid green;
    }

    .flex-container2 {
      display: flex;
      /*flex-wrap: wrap;*/
      flex-wrap: wrap;
      /* background-color: lightyellow; */
    }

    .flex-container2>div {
      background-color: #f1f1f1;
      width: 70px;
      margin: 10px;
      text-align: center;
      line-height: 70px;
      font-size: 16px;
      border-top-left-radius: -25px;
      border-top-right-radius: -25px;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
      border: 4px solid green;

    }


    .Vacant {
      border: 4px solid green;
      color: green;
      font-weight: bold;

    }

    .Hold {
      border: 4px solid orange;
      color: orange;
      font-weight: bold;

    }

    .Sold {
      border: 4px solid red;
      color: red;
      font-weight: bold;

    }
  </style>

@endsection

@section('content')

<div class="container-fluid pl-3 pr-3">

    <!-- start page title -->
    @livewire('page-title', [ 'sub_title' => 'CRM' , 'active_title' => 'Pre Sales Dashboard' , 'page_title' => 'Pre Sales Dashboard'  ])
    @livewire('dashboard.dashboard-presales')
<!-- end page title -->
</div>



@endsection
