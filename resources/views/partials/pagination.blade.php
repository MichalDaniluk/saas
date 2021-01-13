@if($pagination->total() > $pagination->perPage())
<div class="wrapper">
    <div class="pagination">
        @if($pagination->currentPage() !== 1)
        <a href="{{ $pagination->previousPageUrl() }}" class=""paginationPrev>
            <i class="fa fa-caret-left">Wstecz</i>
        </a>
        @endif
        @if($pagination->hasMorePages())
        <a href="{{ $pagination->nextPageUrl() }}" class="paginationNext">
            <i class="fa fa-caret-right">Dalej</i>
        </a>
        @endif
    </div>
</div>
@endif
