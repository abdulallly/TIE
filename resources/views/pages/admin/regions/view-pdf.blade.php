<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover bg-light table-sm">
                    <thead>
                    <tr>
                        <th>S/n</th>
                        <th>Regions</th>
                    </tr>
                    </thead>
                        <tbody>
                        @foreach ($regions as $key => $request)
                            <tr role="row" class="odd">
                                <td>{{ ++$key }}</td>
                                <td>{{  $request->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
{{--    </div>--}}
{{--</div>--}}
</body>
</html>
