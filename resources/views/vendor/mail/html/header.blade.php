@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="storage/logo.png" class="logo" alt="SJMC Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
