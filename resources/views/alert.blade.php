<div class="">
    @if(session()->get('fail'))
    <div class="alert alert-danger alert-dismissible fade show" id="idfail">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Fail: {{ (session()->get('fail'))}}</strong>
    </div>
    @elseif(session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" id="idsuccess">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success: {{ (session()->get('success'))}}</strong>
    </div>
    @endif
</div>
