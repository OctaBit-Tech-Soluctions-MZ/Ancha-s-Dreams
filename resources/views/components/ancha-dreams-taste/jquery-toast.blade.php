@push('script')
<script>$.NotificationApp.send("{{ $title }}","{{ $message }}","{{ $position }}","{{ $background }}","{{ $icon }}")</script>                                         
@endpush