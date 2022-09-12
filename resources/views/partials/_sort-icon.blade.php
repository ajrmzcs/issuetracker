@if ($sortField !== $field)
    <i class="text-muted fas fa-sort"></i>
@elseif ($sortAsc)
    <x-arrow-up-icon class="block h-3 w-auto" />
@else
    <x-arrow-down-icon class="block h-3 w-auto" />
@endif
