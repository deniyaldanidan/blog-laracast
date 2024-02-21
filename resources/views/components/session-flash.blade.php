@if (session()->has('success'))
    <x-toast :message="session('success')" :status="'success'" />
@endif
@if (session()->has('error'))
    <x-toast :message="session('error')" :status="'error'" />
@endif
@if (session()->has('warn'))
    <x-toast :message="session('warn')" :status="'warn'" />
@endif

<script src="/js/toast-script.js"></script>
