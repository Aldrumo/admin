@if ($inEditor)
<div class="content-editor">
@endif
{{ $slot }}
@if ($inEditor)
</div>
@endif
