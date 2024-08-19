{{-- Error Alert --}}
@if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

{{-- Success Alert --}}
@if (session('success'))
    <div class="pt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<script>
    // Function to automatically close alerts after 3 seconds
    function autoCloseAlert(alertId) {
        var alert = document.getElementById(alertId);
        if (alert) {
            setTimeout(function() {
                var closeButton = alert.querySelector('.btn-close');
                if (closeButton) {
                    closeButton.click();
                }
            }, 5000); // 5000 milliseconds = 3 seconds
        }
    }

    // Call the function for both error and success alerts
    autoCloseAlert('errorAlert');
    autoCloseAlert('successAlert');
</script>
