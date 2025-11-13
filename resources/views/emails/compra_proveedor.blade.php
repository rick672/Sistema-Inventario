<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de compra Nro. {{ $compra->id }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 700px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            padding: 30px;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #0056b3;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #0056b3;
            font-size: 24px;
            margin: 0;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
        }

        .details {
            background-color: #f1f5fb;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }

        .details ul {
            padding-left: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 15px;
        }

        th, td {
            border: 1px solid #dcdfe3;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #0056b3;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9fbfd;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 13px;
            color: #777;
            border-top: 1px solid #e0e0e0;
            padding-top: 15px;
        }

        .footer a {
            color: #0056b3;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Orden de compra N° {{ $compra->id }}</h1>
        </div>

        <div class="content">
            <p>Hola <strong>{{ $compra->proveedor->nombre }}</strong>,</p>
            <p>Se ha generado una nueva orden de compra con el número <strong>{{ $compra->id }}</strong>.</p>

            <div class="details">
                <p><strong>Detalles de la orden:</strong></p>
                <ul>
                    <li><strong>Fecha:</strong> {{ $compra->fecha }}</li>
                    <li><strong>Proveedor:</strong> {{ $proveedor->nombre }}</li>
                </ul>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $detalle)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p style="margin-top: 25px;">
                Agradecemos su atención y esperamos su confirmación.  
                <br>Saludos cordiales,  
                <br><strong>Departamento de Compras</strong>
            </p>
        </div>

        <div class="footer">
            © {{ date('Y') }} - Sistema de Compras.  
            <br>
            Este mensaje fue generado automáticamente. No responda a este correo.
        </div>
    </div>
</body>
</html>
