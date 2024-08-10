@foreach (['success', 'warning', 'danger'] as $status)
    @if (session($status))
        <div class="alert alert-{{ $status }} alert-dismissable custom-{{ $status }}-box">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session($status) }}</strong>
        </div>
    @endif
@endforeach
<script>
    setTimeout(() => {
        $('.alert').hide('slow')
    }, 2000);
</script>
