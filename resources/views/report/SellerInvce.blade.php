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

        .f-18 {
            font-size: 16px !important;
        }

    </style>
</head>

<body dir="rtl">
    <br><br>
    <table class="table">
        <tr>
            <th>التاريخ</th>
            <td>{{ date('Y/m/d') }}</td>
            <th colspan="4"> فاتورة &nbsp; Invoice</th>
            <th>Date</th>
        </tr>

        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <th class="right">#</th>
            <th class="right">رقم الصنف</th>
            <th class="right">البيان</th>
            <th class="right">الكمية</th>
            <th class="right">السعر</th>
            <th class="right">{{ 'الخـصم:' . '%' . $percent }}</th>
            <th class="right">المجموع</th>
        </tr>
        @php $x= 1; @endphp
        @foreach ($CardPro as $i)
            <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $i->produact->id }}</td>
                <td>{{ $i->produact->cate_name }}</td>
                <td>{{ $i->quantity }}</td>
                <td>{{ $i->price }}</td>
                <td>{{ $i->our_percent }}</td>
                <td>
                    {{ $i->total - $i->our_percent }}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4"></td>
            <th colspan="2">إجــمالي</th>
            <th>{{ $total }}</th>
        </tr>

        <tr>
            <td colspan="4"></td>
            <th colspan="2">رسوم التوصيل</th>
            <th>{{ $deliver_Percent }}</th>
        </tr>
        <tr>
            <td colspan="4"></td>
            <th colspan="2">صافي الفاتورة</th>
            <th>{{ $total - $deliver_Percent }}</th>
        </tr>
        <tr>
            <th>التوقيع</th>
            <td colspan="3">|</td>
            <th> الختم </th>

        </tr>
        <tr>
            <td></td>
            @if ($invoce->stutus_seller == 1)
                <th colspan="5">حالة الفاتورة : <u>مستحقة</u></th>
            @else
                <th colspan="5">حالة الفاتورة : <u>غير مستحقة</u></th>
            @endif
            <td></td>
        </tr>
        <tr>
            <th>للتوصل:موبايل</th>
            <td>0903320205</td>
            <td colspan="3"></td>
            <th>للتوصل:واتساب</th>
            <td>0903320205</td>
        </tr>
        <tr>
            <td colspan="7" class="center">FORE MALL </td>
        </tr>

        <tr>
            <td class="center f-18" colspan="7">لاتعتبر الفاتورة مسددة (<u>مستحقة</u>)الا في حال اقفال الطلب نهائيا من
                قبل
                المندوب
                والمستلم
                عبر تاكيد
                الباركود
            </td>
        </tr>
    </table>
    <img src="{{url('img/noorders.png')}}" alt="">

</body>


</html>
