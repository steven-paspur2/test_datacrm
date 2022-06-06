<!-- 
    @AUTHOR: Jeison Steven Paspur
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Test Document</title>
</head>
<body>
    <div  class="container" >
        <div class="row">
            <h1> Data </h1>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Contact_no</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Createdtime</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                        </tbody>
                    </table>
                </div>
            <button type="button" class="btn btn-success" onclick="loadData('body');">Load Data</button>        
        </div>
    </div>
    
    <script src="js/functions.js"></script>
</body>
</html>