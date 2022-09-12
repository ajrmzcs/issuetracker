@if ($isAdmin)
    <div class="text-green-800">
        <x-check-icon />
    </div>
@else
    <div class="text-red-800">
        <x-x-icon />
    </div>
@endif
