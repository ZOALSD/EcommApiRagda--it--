<html>

<head>

    <title>{{ $title }}</title>

    <meta http-equiv="Content-Type" charset="utf-8" content="text/html" />
    <style type="text/css" media="all">
        body {

            font-family: 'XB Riyaz';
            font-size: 18px;

        }

        .f24 {
            font-size: 24px;
            font-weight: bold;
        }

        .f22 {
            font-size: 22px;
        }

        .f22t {
            font-weight: bold;
            font-size: 22px;

        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th {}

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-bottom: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .center {
            text-align: center;
        }

        .mt20 {
            margin-top: -20px;
        }

    </style>
</head>

<body dir="rtl">
    <br><br>
    <h4><u>{{ $title }}</u></h4>
    <table class="table">
        <tr>
            <th>#</th>
            <th class="right">الاســم </th>
            <th class="right">البريد الالكتروني</th>
            <th class="right">رقم الهاتف</th>
            <th class="right">تاريخ التسجيل </th>
        </tr>
        @php $x= 1; @endphp
        @foreach ($clint as $i)
            <tr>
                <td>
                    {{ $x++ }}
                </td>
                <td>{{ $i->name }}</td>
                <td>{{ $i->email }}</td>
                <td>{{ $i->phone }}</td>
                <td>{{ $i->created_at->format('Y/m/d') }}</td>
            </tr>
        @endforeach
    </table>

    <h4 class="left">
        تاريخ اليوم : {{ date('Y/m/d') }}<br />
        T {{ date('H:i:s') }}
    </h4>
</body>


</html>
