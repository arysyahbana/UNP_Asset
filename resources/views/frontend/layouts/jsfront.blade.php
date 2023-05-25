<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

<script src="{{ asset('dist_frontend/js/iziToast.min.js') }}"></script>

{{-- <script>
    function redirectTo(link1, link2) {

        window.location.href = link1;

        window.location.href = link2;

    }
</script> --}}

<script>
    $(document).ready(function() {
        $('.download-btn').click(function(e) {
            e.preventDefault(); // membatalkan tindakan default tombol download

            // URL untuk mendownload file
            var file_url = $(this).attr('href');

            // membuat elemen link untuk proses download
            var link = document.createElement("a");
            link.href = file_url;
            link.download = true;

            // mengklik elemen link untuk memulai proses download
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            // menampilkan modal setelah proses download selesai
            $('#exampleModal').modal('show');
        });
    });
</script>




<script>
    function copyText() {
        var copyText = document.getElementById("salin");
        copyText.select();
        document.execCommand("copy");
        alert("Teks berhasil dicopy");
    }
</script>
{{-- copy --}}
{{-- en copy --}}
{{-- s --}}
