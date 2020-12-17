@if ($inEditor)
<div class="content-editor">{{ $slot }}</div>
@else
{{ $slot }}
@endif
