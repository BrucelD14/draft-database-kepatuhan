<script>
    // Add JavaScript code to auto-submit the form on select change
    document.getElementById('tanggal_penetapan').addEventListener('change', function() {
        document.getElementById('search-form').submit();
    });
</script>
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
