<script src="{{ asset('js/Bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
{{-- JQuery --}}
<script src="{{ asset('js/plugins/jquery-3.5.1.min.js') }}"></script>
{{-- WOW JS --}}
<script src="{{ asset('js/plugins/wow.min.js') }}"></script>


<script>
    new WOW().init();

    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true
        });
    });
</script>

{{-- Data Table JS --}}
<script src="{{ asset('js/plugins/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datatables/en/dataTables.bootstrap5.min.js') }}"></script>

@yield("script-files")
