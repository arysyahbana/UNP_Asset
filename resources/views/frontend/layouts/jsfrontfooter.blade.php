<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach

@endif
@if (session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

@if (session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

{{-- js aos --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
{{-- end js aos --}}

{{-- initialize aos --}}
<script>
    AOS.init();
</script>
{{-- end initialize aos --}}
{{-- pembayaran --}}
<script>
    var totalPajak;

    function subscribe() {
        const subscribe = document.getElementById('subscribe');
        const psubscribe = document.getElementById('psubscribe');
        const pajak = document.getElementById('pajak');
        const total = document.getElementById('total');
        var ppn = pajak.value;

        if (subscribe.value == 1) {
            psubscribe.value = "Rp. 1.200.000";
            pajak.value = 0.1 * 1200000;
            ppn = pajak.value;
            totalPajak = total.value = 1200000 + parseInt(ppn);
        } else if (subscribe.value == 2) {
            psubscribe.value = "Rp. 150.000";
            pajak.value = 0.1 * 150000;
            ppn = pajak.value;
            totalPajak = total.value = 150000 + parseInt(ppn);
        }
        // return totalPajak;
    }
</script>
{{-- end pembayaran --}}

{{-- konfirmasi pembayaran --}}
<script>
    function test() {
        // Ambil referensi elemen select date
        // var date1 = document.getElementById('konfirmasi');
        var total = document.getElementById('total');
        var konfirmasi = document.getElementById('konfirmasi');
        if (total.value == '') {
            iziToast.error({
                // title: 'Error',
                message: 'Belum memilih Plan Subscribe',
                position: 'topRight'
            });

        } else {
            $('#bayar').modal('show');
        }

    }
</script>
{{-- end konfirmasi pembayaran --}}

<script>
    function loginfail() {
        iziToast.error({
            // title: 'Notifikasi',
            message: 'Anda Belum Login',
            position: 'topRight',
            timeout: 5000, // Durasi tampilan alert dalam milidetik (ms)
            progressBar: true, // Menampilkan progress bar
            buttons: [
                ['<button class="rounded-pill">OK</button>', function(instance, toast) {
                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast);
                }]
            ]
        });
    }
</script>
{{-- radio --}}
<script>
    function getValue() {
        $('#bayar').modal('hide');
        $.ajax({
            url: "{{ route('noHp') }}",
            type: "GET",
            dataType: "json",
            success: function(data) {
                if (data == '') {
                    iziToast.error({
                        // title: 'Error',
                        message: 'anda belum mengisikan no HP',
                        position: 'topRight'
                    });
                } else {
                    var radioButton = $("input[name='pembayaran']:checked").val();
                    var virtual = document.getElementById('virtual');
                    var total2 = document.getElementById('total2');
                    $("#konBayar").modal("show");
                    virtual.value = radioButton + data;
                    total2.value = totalPajak;
                }

            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // pesan kesalahan jika permintaan gagal
            }
        });

    }
</script>
