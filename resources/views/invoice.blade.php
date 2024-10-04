<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .invoice-container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            margin: 0;
        }

        .company-details {
            text-align: right;
        }

        .invoice-details {
            width: 100%;
            margin-bottom: 20px;
        }

        .invoice-details th, .invoice-details td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .invoice-details th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            margin-top: 20px;
        }

        .total .total-amount {
            font-size: 1.5em;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="invoice-container">
        <div class="invoice-header">
            <div>
                <h1>Invoice</h1>
                <p>Invoice #12345</p>
                <p>Date: 04-October-2024</p>
            </div>
            <div class="company-details">
                <p><strong>Company Name</strong></p>
                <p>123 Business St.</p>
                <p>City, State, Zip Code</p>
                <p>Email: info@company.com</p>
            </div>
        </div>

        <table class="invoice-details">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Web Development Services</td>
                    <td>10 Hours</td>
                    <td>$50</td>
                    <td>$500</td>
                </tr>
                <tr>
                    <td>Website Hosting</td>
                    <td>1 Month</td>
                    <td>$10</td>
                    <td>$10</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <p>Total Amount Due: <span class="total-amount">$510</span></p>
        </div>
    </div>

</body>
</html>
