@if (session('danger'))
    @php
        $message = session('danger');
    @endphp
    <script>
        let message = "<?= $message ?>"
        Swal.fire({
            title: 'Error !',
            text: message,
            icon: 'error',
            confirmButtonText: 'OKE'
        })
    </script>
@endif
@if (session('success'))
    @php
        $message = session('success');
    @endphp
    <script>
        let message = "<?= $message ?>"
        Swal.fire({
            title: 'Success !',
            text: message,
            icon: 'success',
            confirmButtonText: 'OKE'
        })
    </script>
@endif
