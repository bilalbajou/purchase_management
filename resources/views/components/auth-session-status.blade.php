@props(['status'])

@if ($status)
<div class="alert alert-info" role="alert">  
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
</div>
@endif
