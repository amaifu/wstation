@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<h1 style="color: #60a5fa; font-size: 1.875rem; line-height: 2.25rem; font-weight: bold; font-style: italic;">WStation.</h1>
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
