<div class="actions" id="tcactions">
    @if (in_array('edit', $actions))
        <a class="action edit" href="#edit"></a>
    @endif

    @if (in_array('delete', $actions))
        <a class="action delete" href="#delete"></a>
    @endif

    @if (in_array('ambience', $actions))
        <a class="action ambience" href="#ambience" data-help="day-night-mode"></a>
    @endif

    @if (in_array('print', $actions))
        <a class="action print" href="#print"></a>
    @endif
</div>
