<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="Config::get('app.url')">
@if(isset($logo))
{{ $logo }}
@else
{{ Config::get('app.name') }}
@endif
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
@if(isset($copyright))
© {{ System\Support\Calendar::now()->year }} {{ $copyright }}. @lang('All rights reserved.')
@else
© {{ System\Support\Calendar::now()->year }} {{ Config::get('app.company', Config::get('app.name')) }}. @lang('All rights reserved.')
@endif
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
