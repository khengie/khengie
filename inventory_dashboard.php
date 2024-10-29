<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System Mockup</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            margin-top: 20px;
        }
        .dashboard {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .table-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
        }
        table, th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        .reorder-interface {
            margin-top: 20px;
            text-align: left;
            display: flex;
            justify-content: center;
        }
        .reorder-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1>Inventory Management System Mockup</h1>
<h2>Dashboard</h2>
<p>Total Items: 100 | Total Quantity: 5,000 units | Avg. Unit Cost: $1.75 | Items to Reorder: 15 items</p>

<div class="dashboard">
    <canvas id="inventoryChart" width="300" height="200"></canvas> <!-- Adjusted size -->
    <canvas id="costChart" width="300" height="200"></canvas>     <!-- Adjusted size -->
</div>

<div class="table-container">
    <table>
        <tr>
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Last Year Qty</th>
            <th>This Year Qty</th>
            <th>Stock Change</th>
            <th>Last Year Cost ($)</th>
            <th>This Year Cost ($)</th>
            <th>Cost Change ($)</th>
        </tr>
        <?php
        // Inventory data array with cost data
        $inventory_data = [
            ["code" => "FZG001", "name" => "Frozen Peas", "last_year_qty" => 56, "this_year_qty" => 50, "stock_change" => -6, "last_year_cost" => 1.5, "this_year_cost" => 1.8],
            ["code" => "FZG002", "name" => "Frozen Spinach", "last_year_qty" => 95, "this_year_qty" => 90, "stock_change" => -5, "last_year_cost" => 2.0, "this_year_cost" => 2.3],
            ["code" => "FZG006", "name" => "Ground Beef", "last_year_qty" => 85, "this_year_qty" => 80, "stock_change" => -5, "last_year_cost" => 3.0, "this_year_cost" => 3.5],
            ["code" => "FZG008", "name" => "Fish Fillet", "last_year_qty" => 65, "this_year_qty" => 60, "stock_change" => -5, "last_year_cost" => 2.5, "this_year_cost" => 2.7],
            ["code" => "FZG009", "name" => "Shrimp", "last_year_qty" => 45, "this_year_qty" => 40, "stock_change" => -5, "last_year_cost" => 2.2, "this_year_cost" => 2.5],
        ];

        // Loop through the data and display it in table rows
        foreach ($inventory_data as $item) {
            $cost_change = $item['this_year_cost'] - $item['last_year_cost'];
            echo "<tr>";
            echo "<td>{$item['code']}</td>";
            echo "<td>{$item['name']}</td>";
            echo "<td>{$item['last_year_qty']}</td>";
            echo "<td>{$item['this_year_qty']}</td>";
            echo "<td>{$item['stock_change']}</td>";
            echo "<td>\${$item['last_year_cost']}</td>";
            echo "<td>\${$item['this_year_cost']}</td>";
            echo "<td>\$" . number_format($cost_change, 2) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<div class="reorder-interface">
    <div>
        <p>Select Item: <strong>Frozen Peas</strong></p>
        <p>Current Stock: 50</p>
        <p>Reorder Quantity: 20</p>
        <button class="reorder-button">Place Reorder</button>
    </div>
</div>

<script>
    // Inventory Comparison Chart
    const inventoryCtx = document.getElementById('inventoryChart').getContext('2d');
    new Chart(inventoryCtx, {
        type: 'bar',
        data: {
            labels: ['Frozen Peas', 'Frozen Spinach', 'Ground Beef', 'Fish Fillet', 'Shrimp'],
            datasets: [
                {
                    label: 'Last Year',
                    data: [56, 95, 85, 65, 45],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                },
                {
                    label: 'This Year',
                    data: [50, 90, 80, 60, 40],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Cost Analysis Chart
    const costCtx = document.getElementById('costChart').getContext('2d');
    new Chart(costCtx, {
        type: 'bar',
        data: {
            labels: ['Frozen Peas', 'Frozen Spinach', 'Ground Beef', 'Fish Fillet', 'Shrimp'],
            datasets: [
                {
                    label: 'Last Year',
                    data: [1.5, 2.0, 3.0, 2.5, 2.2],
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                },
                {
                    label: 'This Year',
                    data: [1.8, 2.3, 3.5, 2.7, 2.5],
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
