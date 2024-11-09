<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example Table</title>
    <style>
    .table-container {
        display: flex;
    }

    .column {
        margin-right: 10px;
    }

    .column table {
        border-collapse: collapse;
    }

    .column th,
    .column td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    .column th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <div class="table-container">


        <div class="column">
            <table>
                <thead>
                    <tr>
                        <th>Mã Tour</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>T001</td>
                    </tr>
                    <tr>
                        <td>T002</td>
                    </tr>
                    <tr>
                        <td>T003</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="column">
            <table>
                <thead>
                    <tr>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>5,000,000 VND</td>
                    </tr>
                    <tr>
                        <td>6,000,000 VND</td>
                    </tr>
                    <tr>
                        <td>7,000,000 VND</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="column">
            <table>
                <thead>
                    <tr>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="button" value="Gửi"></input> </td>
                    </tr>
                    <tr>
                        <td><button>Gửi</button> </td>
                    </tr>
                    <tr>
                        <td><button>Gửi</button> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>