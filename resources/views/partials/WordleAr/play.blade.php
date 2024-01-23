@include('partials.WordleAr.custom-navbar-play')
@include('partials.WordleAr.modal-status')
@if(isset($retrievedJsonObject['date']) == 'today')
    @php
        $showNav = 'show';
    @endphp
@endif
@if($showNav === "show")
    @include('partials.WordleAr.modal-how-to-play')
@endif

@script
<script>
    $(document).ready(function () {
        $('#game-board-container').css({'display': 'unset'});
    });

</script>
@endscript
