<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Embedded Style Sheet</title>
        <style>
            .title {
                font-family: sans-serif;
                text-align: center
            }

            .styled-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            .styled-table thead tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
            }

            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
            }

            .styled-table tbody tr {
                border-bottom: 1px solid #dddddd;
            }

            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }

            .styled-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
            }

            .styled-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
            }
        </style>
    </head>

    <div style="width: 100%">
        <h3 class="title">Relatório geral de abastecimentos</h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Data</th>
                    <th>Motorista</th>
                    <th>Carro</th>
                    <th>Combustível</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supply ?? '' as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{ date('d/m/Y', strtotime($data->date))}}</td>
                        <td>{{$data->driver_name}}</td>
                        <td>{{$data->car_name}}</td>
                        <td>{{$data->fuel_type}}</td>
                        <td>{{$data->quantity_supplied}}</td>
                        <td>R${{$data->total_supplied}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</html>