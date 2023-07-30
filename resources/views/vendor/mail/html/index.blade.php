@component('mail::message', ['logo' => $logo ?? null, 'copyright' => $copyright ?? null])
{!! $slot ?? '' !!}
@endcomponent