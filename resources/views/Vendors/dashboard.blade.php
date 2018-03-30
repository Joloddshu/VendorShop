@extends('Vendors.index')

@section('css')
    <style>

    </style>
    @endsection

@section('maincontent')
    <div class="row">

        <div class="col s3 vendor_order">

                <div class="col s7">
                    <div class="orders_content">
                        <i class="material-icons background-round">add_shopping_cart</i>
                        <p>Orders</p>
                    </div>
                </div>
                <div class="col s5">
                    <p class="order_class_text">$5000</p>
                </div>

        </div>

        <div class="col s3 vendor_client">

            <div class="col s7">
                <div class="orders_content">
                    <i class="material-icons background-round">supervisor_account</i>
                    <p>Clients</p>
                </div>
            </div>
            <div class="col s5">
                <p class="order_class_text">50</p>
            </div>

        </div>

        <div class="col s3 vendor_sales">

            <div class="col s7">
                <div class="orders_content">
                    <i class="material-icons background-round">shopping_cart</i>
                    <p>Sales</p>
                </div>
            </div>
            <div class="col s5">
                <p class="order_class_text">$5000</p>
            </div>

        </div>
        <div class="col s3 vendor_profit">

            <div class="col s7">
                <div class="orders_content">
                    <i class="material-icons background-round">shopping_cart</i>
                    <p>Sales</p>
                </div>
            </div>
            <div class="col s5">
                <p class="order_class_text">$5000</p>
            </div>

        </div>

    </div>

    <div class="vendors_revenue_graph">
        <div class="row">
            <div class="col s7 chart-left">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col s5 latest_order">
                <h4 style="text-align: center">Latest Orders</h4>
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                    </tr>
                    <tr>
                        <td>Alan</td>
                        <td>Jellybean</td>
                        <td>$3.76</td>
                    </tr>
                    <tr>
                        <td>Jonathan</td>
                        <td>Lollipop</td>
                        <td>$7.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection


@section('js')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [{
                    label: "Monthly sales Report",
                    backgroundColor: '#0F9ED4',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45,40,50,60,70,100],

                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

@endsection