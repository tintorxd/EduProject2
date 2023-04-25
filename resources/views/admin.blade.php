


@if (auth('webadmin')->check())
   @php
   $masterTemplate =  '../AdminMain';
   @endphp
@else
   @php
   $masterTemplate =  '../adminLogin';
   @endphp
@endif

@extends($masterTemplate) 








