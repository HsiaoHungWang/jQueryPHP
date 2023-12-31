<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h2>jQuery 練習</h2>
                <table id="products" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ProductID</th>
                <th>ProductName</th>
                <th>unitprice</th>
                <th>UnitsInStock</th>              
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ProductID</th>
                <th>ProductName</th>
                <th>unitprice</th>
                <th>UnitsInStock</th>               
            </tr>
        </tfoot>
    </table>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $('#products').DataTable({
                ajax:'ProductsApi.php',
                columns:[
                    {data: 'ProductID'},
                    {data: 'ProductName'},
                    {data: 'unitprice'},
                    {data: 'UnitsInStock'}
                ]
            });
        })
    </script>
</body>

</html>