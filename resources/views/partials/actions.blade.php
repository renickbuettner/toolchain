<div class="actions">
    @if (in_array('edit', $actions))
        <a class="action edit" href="#edit" id="tcactionedit"></a>
    @endif

    @if (in_array('delete', $actions))
        <a class="action delete" href="#delete" id="tcactiondelete"></a>
    @endif

    @if (in_array('ambience', $actions))
        <a class="action ambience" href="#ambience" id="tcactionambience" data-help="day-night-mode"></a>
    @endif

    @if (in_array('print', $actions))
        <a class="action print" href="#print" id="tcactionprint"></a>
    @endif
</div>
