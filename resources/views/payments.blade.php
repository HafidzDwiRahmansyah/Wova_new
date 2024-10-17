<!DOCTYPE html>
<html>

<head>
    <title>Pembayaran CV</title>
</head>

<body>
    <h1>Pembayaran</h1>
    <form id="payment-form" action="/submit-payment" method="POST">
        @csrf <!-- Pastikan CSRF token ditambahkan -->
        <input type="hidden" name="order_id" id="order_id"> <!-- Ini akan diisi dengan order_id dari Midtrans -->
        <input type="hidden" name="transaction_token" id="transaction_token"> <!-- Masih simpan token jika diperlukan -->
    </form>
    <button id="pay-button">Bayar Sekarang</button>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    // Ambil order_id dari result
                    const orderId = result.order_id; // Pastikan order_id tersedia dalam objek result
                    // Kirim order_id ke input dan token transaksi ke input
                    document.getElementById('order_id').value = orderId;
                    document.getElementById('transaction_token').value = result.token;
                    // Kemudian submit formulir
                    document.getElementById('payment-form').submit();
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran Anda!");
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                }
            });
        };
    </script>
</body>

</html>