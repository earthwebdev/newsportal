@if(session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif


        @if(session('error'))
        <div class="text-danger">{{ session('error') }}</div>
        @endif
