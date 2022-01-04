@php
$obj = DB::table('companies')
    ->where('ibc_id', '=', 1)
    ->get();
// DB::table('companies')->get()
if (count($obj) > 0) {
    # code...
    $logo = $obj[0]->sbc_logo_small;
}
@endphp


{{-- <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
  <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"/>
  <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"/>
</svg> --}}
<div class="logocon">
  @if (count($obj) > 0)
      <a href="/">
          <img src="{{ Storage::url($logo) }}" alt="{{ Storage::url($logo) }}">
      </a>
  @else
      <strong class="text-white" style="color: black">No logo add on default data</strong>
  @endif
</div>

 