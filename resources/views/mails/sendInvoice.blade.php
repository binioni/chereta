@component('mail::message')

<div style="display: inline">
  <div style="text-align: left;">
    {{ $content["CompanyName"] }}
  </div>
  <div style="text-align: right;">
    {{ $content["InvDate"] }} 

    Invoice for {{ '# '.$content["InvNo"] }}
  </div>
</div>
<br/>
{{ $content["CompanyAddress"] }}
<br/>

##### Item Details
<hr>
@component('mail::table')

  | Item       | Quantity      | Price     |
  | :------------ |:-------------| :-------------|
  @foreach ($content["Details"] as $itm)
    | {{ $itm["Item"] }} | {{ $itm["Qty"] }} | {{ number_format($itm["Price"],2) }} | 
  @endforeach
@endcomponent
<br/>

##### Payment Details
<hr>
@component('mail::table')

  | Item       | Total      |
  | :------------ |:-------------|
  @foreach ($content["Payment"] as $itm)
    | {{ $itm["Item"] }} | {{ number_format($itm["Total"], 2) }} |
  @endforeach
@endcomponent
<br/>

Thanks,<br>
{{ config('app.name') }}
@endcomponent