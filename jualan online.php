<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja Online</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        h2, h3 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        label {
            margin-top: 10px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            display: inline-block;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .notification {
            display: none;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Belanja Online</h2>
        <form id="orderForm">
            <label for="customerName">Nama Customer:</label>
            <input type="text" id="customerName" name="customerName" class="form-control">
            <label for="product">Pilih Produk:</label>
            <select id="product" name="product" class="form-control">
                <option value="tv">TV</option>
                <option value="kulkas">Kulkas</option>
                <option value="mesinCuci">Mesin Cuci</option>
            </select>
            <label for="quantity">Jumlah Beli:</label>
            <input type="number" id="quantity" name="quantity" class="form-control">
            <label for="totalBelanja">Total Belanja:</label>
            <input type="text" id="totalBelanja" name="totalBelanja" value="Rp. 0,-" readonly class="form-control">
            <input type="submit" class="btn btn-primary mt-3" value="Belanja Sekarang">
        </form>
        <div id="notification" class="notification"></div>
        <h3 class="mt-4">Daftar Harga</h3>
        <ul>
            <li>TV: Rp. 4.200.000</li>
            <li>Kulkas: Rp. 3.100.000</li>
            <li>Mesin Cuci: Rp. 3.800.000</li>
        </ul>
        <p class="text-muted">Harga dapat berubah setiap saat.</p>
    </div>

    <!-- Tambahkan link Bootstrap JS (opsional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('orderForm').addEventListener('submit', function (event) {
            event.preventDefault();

            var productName = document.getElementById('product').value;
            var quantity = parseInt(document.getElementById('quantity').value);
            var totalPrice = 0;

            switch (productName) {
                case 'tv':
                    totalPrice = quantity * 4200000;
                    break;
                case 'kulkas':
                    totalPrice = quantity * 3100000;
                    break;
                case 'mesinCuci':
                    totalPrice = quantity * 3800000;
                    break;
                default:
                    totalPrice = 0;
            }

            var formattedPrice = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalPrice);
            document.getElementById('totalBelanja').value = formattedPrice;

            var customerName = document.getElementById('customerName').value;
            var notification = document.getElementById('notification');
            notification.innerHTML = `<h3 class="mb-3">Pesanan diterima!</h3>
                <p class="lead mb-0">Terima kasih ${customerName} atas pesanannya.<br>
                Produk: ${productName}<br>
                Jumlah: ${quantity}<br>
                Total Belanja: ${formattedPrice}</p>`;

            notification.style.display = 'block';
        });
    </script>
</body>
</html>
