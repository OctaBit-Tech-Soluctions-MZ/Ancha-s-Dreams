<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ancha´s Dream Taste') }}</title>
    <style>
        /* === Geral === */
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #495057;
            margin: 20px;
        }

        h3,
        h4,
        h6 {
            margin: 0;
            color: #343a40;
        }

        h3 {
            font-size: 22px;
        }

        h4 {
            font-size: 18px;
        }

        h6 {
            font-size: 14px;
        }

        /* === Utilidades === */
        .float-start {
            float: left;
        }

        .float-end {
            float: right;
        }

        .text-end {
            text-align: right;
        }

        .text-sm-end {
            text-align: right;
        }

        .text-muted {
            color: #6c757d;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .pt-3 {
            padding-top: 1rem;
        }

        /* === Layout (grid simulado) === */
        .row::after {
            content: "";
            display: table;
            clear: both;
        }

        .col-sm-4,
        .col-4,
        .col-6,
        .col-sm-6 {
            float: left;
            padding: 5px;
        }

        .col-sm-4 {
            width: 33.33%;
        }

        .col-sm-6,
        .col-6 {
            width: 50%;
        }

        .offset-sm-2 {
            margin-left: 16.66%;
        }

        /* === Card === */
        .card {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 20px;
        }

        .card-body {
            padding: 10px 0;
        }

        /* === Badge === */
        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 12px;
            border-radius: 4px;
        }

        .badge-warning-lighten {
            background-color: #fff3cd;
            color: #856404;
        }

        .badge-success-lighten {
            background-color: #d4edda;
            color: #155724;
        }

        /* === Tabela === */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table thead {
            background-color: #f1f3fa;
            font-weight: bold;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #dee2e6;
        }

        .table td.text-end {
            text-align: right;
        }

        /* === Totais === */
        .float-end {
            float: right;
        }

        .total-box {
            margin-top: 10px;
            text-align: right;
        }

        .total-box p {
            margin: 4px 0;
            font-size: 13px;
        }

        .total-box h3 {
            margin-top: 8px;
            font-size: 20px;
            color: #000;
        }

        /* === Notas === */
        small {
            font-size: 11px;
            color: #6c757d;
            line-height: 1.5;
            display: block;
        }
    </style>


</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Invoice Logo-->
                    <div class="clearfix">
                        <div class="float-start mb-3">
                            <img src="{{ asset('admin/images/logo-light.png') }}" alt="" height="18">
                        </div>
                        <div class="float-end">
                            <h4 class="m-0 d-print-none">Relatorio</h4>
                        </div>
                    </div>

                    <!-- Invoice Detail-->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="float-end mt-3">
                                <p><b>Ola, {{$order->users->name}} {{$order->users->surname}}</b></p>
                                <p class="text-muted font-13">Prezado(a),
                                    Segue abaixo uma análise dos custos referentes à sua recente compra, incluindo
                                    cursos, livros e produtos culinários.
                                    Solicitamos, por gentileza, que o pagamento seja efetuado o mais breve possível.
                                    Caso tenha qualquer dúvida ou necessite de esclarecimentos adicionais, estou à
                                    disposição para ajudar.
                                    Agradeço pela confiança!</p>
                            </div>

                        </div><!-- end col -->
                        <div class="col-sm-4 offset-sm-2">
                            <div class="mt-3 float-sm-end">
                                <p class="font-13"><strong>Data do Pedido: </strong> &nbsp;&nbsp;&nbsp;
                                    {{dateInFull($order->created_at)}}</p>
                                <p class="font-13"><strong>Status do Pedido: </strong>
                                    <span class="badge badge-warning-lighten">Pendente</span>
                                </p>
                                <p class="font-13"><strong>ID do Pedido: </strong><span class="float-end">#{{$order->id }}</span>
                                </p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <h6>Endereço da Escola</h6>
                            <address>
                                Lynne K. Higby<br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div> <!-- end col-->

                        <div class="col-sm-4">
                            <div class="text-sm-end">
                                {!! $qrCode !!}
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Quantidade</th>
                                            <th>Valor Unico</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $subtotal = 0; @endphp
                                        @foreach($order->order_items as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                @if(!empty($item->itemable->name))
                                                {{ $item->itemable->name }}
                                                @elseif(!empty($item->itemable->title))
                                                {{ $item->itemable->title }}
                                                @endif
                                            </td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ formatMetical($item->itemable->price) }}</td>
                                            <td class="text-end">{{ formatMetical($item->itemable->price * $item->qty) }}</td>
                                            @php $subtotal = $subtotal + ($item->itemable->price * $item->qty); @endphp
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-3">
                                <h6 class="text-muted">Notas:</h6>
                                <small>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Harum temporibus accusantium fuga saepe nobis est nostrum
                                    aliquid laborum sed? Ducimus ex beatae nihil sint voluptates
                                    non sit quibusdam alias corporis.
                                </small>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-end mt-3 mt-sm-0">
                                <p><b>Total:</b><span class="float-end">  {{ formatMetical($subtotal) }}</span></p>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->
                </div> <!-- end card-body-->
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
</body>

</html>