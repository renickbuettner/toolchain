<div class="actions" id="tcactions">
    @if (in_array('edit', $actions))
        <a class="action edit" href="#edit"></a>
        <div class="action-hover">
            edit
        </div>
    @endif

    @if (in_array('delete', $actions))
            <a class="action delete" href="#delete"></a>
            <div class="action-hover action-hover-delete">
                    delete
            </div>
    @endif

    @if (in_array('ambience', $actions))
        <a class="action ambience" href="#ambience" data-help="day-night-mode"></a>
            <div class="action-hover action-hover-ambience">
                ambience
            </div>
    @endif

    @if (in_array('print', $actions))
        <a class="action print" href="#print"></a>
            <div class="action-hover action-hover-print">
                print
            </div>
    @endif
</div>
