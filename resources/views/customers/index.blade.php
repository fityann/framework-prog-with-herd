<h1>ini halaman pelanggan</h1>

<table border="1">
    <thead>
        <tr>
            <td>Kode Customers</td>
            <td>Nama Customers</td>
            <td>Address Customers</td>
            <td>Phone Customers</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->customer_code }}</td>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->customer_address }}</td>
                <td>{{ $customer->customer_phone }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
