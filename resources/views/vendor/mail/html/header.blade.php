@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
<img src="{{ Text::trim($slot) === Config::get('app.name') ? URL::asset('images/logo.png') : $slot }}" class="logo" alt="Logo">
</a>
</td>
</tr>
