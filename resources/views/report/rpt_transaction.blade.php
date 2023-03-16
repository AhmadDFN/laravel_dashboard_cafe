<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
    <style>
        #header { position: relative; width: 100%; }
        #header img {width: 100px;}
        #header h2 { position: relative; margin: 0; padding: 0; font-size: 25px; font-family: "Arial"; }
        #header p { position: relative; margin: 0; padding: 0; font-size: 16px; font-family: "Arial"; }

        h3 { position: relative;  text-align: center; border-top: 2px solid #000; border-bottom: 2px solid #000; margin: 5px 0; padding: 10px 0; font-family: "Arial"; text-transform: uppercase; }

        #dtTrans { position: relative; border: 1px solid #000; width: 100%; border-collapse: collapse; }
        #dtTrans thead { background: rgb(52, 49, 255); }
        #dtTrans thead th { padding: 10px; text-align: center; font-family: "Arial"; border-collapse: collapse; }

        #dtTrans tbody td { border: 1px solid #000; padding: 5px; text-align: center; font-family: "Arial"; border-collapse: collapse; }
        #dtTrans tfoot td { border: 1px solid #000; padding: 10px; text-align: center; font-size: 22px; font-family: "Arial"; border-collapse: collapse; }
    </style>
</head>
<body>
    <table id="header">
        <tr>
            <td width="5%"><img src="{{ asset("images/logo2.png") }}" alt=""></td>
            <td>
                <h2>iRzellA Cafe</h2>
                <p>JL Jalak IV no 62 MadiunKota Merind</p>
            </td>
        </tr>
    </table>
    <h3>Laporan Transaksi</h3>
    <table id="dtTrans" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Nota</th>
                <th>Tanggal</th>
                <th>Kasir</th>
                <th>Customer</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dtTrans as $rsTrans)
                <tr>
                    <td>{{  $rsTrans->trans_nota }}</td>
                    <td>{{ $rsTrans->trans_tgl }}</td>
                    <td>{{ $rsTrans->name }}</td>
                    <td>{{ $rsTrans->trans_cus_id == 0 ? "Umum" : $rsTrans->cus_nm }}</td>
                    <td style="text-align: right;">{{ number_format($rsTrans->trans_gtotal,0,",",".") }}</td>
                </tr>
                @php
                    $total += $rsTrans->trans_gtotal
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><strong>Grand Total :</strong></td>
                <td style="text-align: right;">{{ number_format($total,0,",",".") }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>