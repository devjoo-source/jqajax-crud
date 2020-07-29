<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery--ajax--CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="alert alert-success mt-4" role="alert">
            <h4 class="alert-heading text-center d-inline">jQuery -- ajax -- CRUD</h4>
            <small class="float-right" style="color:gray"><span class="text-info">Dev: </span>jsjunu@gmail.com</small>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- Alert messages -->
                <div id="warn"></div>
                <!-- Inserting form -->
                <form id="myForm" method="post" action="" class="border rounded p-3">
                    <input id="id" type="hidden" value="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input id="pass" class="form-control" type="password">
                    </div>
                    <input type="submit" class="btn btn-primary form-control" value="Submit">
                </form><!-- /Inserting form -->
            </div>
            <div class="col-md-8">
                <!-- Data table -->
                <div id="tblwarn"></div>
                <table class="table table-hover border rounded">
                    <thead class="thead-light">
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table><!-- /Data table -->
            </div>
        </div>
    </div>



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/myjs.js"></script>
</body>

</html>