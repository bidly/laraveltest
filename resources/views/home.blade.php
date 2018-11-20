@include('inc.header')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Bootstrap Table with Add and Delete Row Feature</title>
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    <style type="text/css">
                        body {
                            color: #404E67;
                            background: #F5F7FA;
                            font-family: 'Open Sans', sans-serif;
                        }
                        .table-wrapper {
                            width: 1000px;
                            margin: 30px auto;
                            background: #fff;
                            padding: 20px;
                            box-shadow: 0 1px 1px rgba(0,0,0,.05);
                        }
                        .table-title {
                            padding-bottom: 10px;
                            margin: 0 0 10px;
                        }
                        .table-title h2 {
                            margin: 6px 0 0;
                            font-size: 22px;
                        }
                        .table-title .add-new {
                            float: right;
                            height: 30px;
                            font-weight: bold;
                            font-size: 12px;
                            text-shadow: none;
                            min-width: 100px;
                            border-radius: 50px;
                            line-height: 13px;
                        }
                        .table-title .add-new i {
                            margin-right: 4px;
                        }
                        table.table {
                            table-layout: fixed;
                        }
                        table.table tr th, table.table tr td {
                            border-color: #e9e9e9;
                        }
                        table.table th i {
                            font-size: 13px;
                            margin: 0 5px;
                            cursor: pointer;
                        }
                        table.table th:last-child {
                            width: 100px;
                        }
                        table.table td a {
                            cursor: pointer;
                            display: inline-block;
                            margin: 0 5px;
                            min-width: 24px;
                        }
                        table.table td a.add {
                            color: #27C46B;
                        }
                        table.table td a.edit {
                            color: #FFC107;
                        }
                        table.table td a.delete {
                            color: #E34724;
                        }
                        table.table td i {
                            font-size: 19px;
                        }
                        table.table td a.add i {
                            font-size: 24px;
                            margin-right: -1px;
                            position: relative;
                            top: 3px;
                        }
                        table.table .form-control {
                            height: 32px;
                            line-height: 32px;
                            box-shadow: none;
                            border-radius: 2px;
                        }
                        table.table .form-control.error {
                            border-color: #f50000;
                        }
                        table.table td .add {
                            display: none;
                        }
                    </style>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('[data-toggle="tooltip"]').tooltip();
                            var actions = $("table td:last-child").html();
                            // Append table with add row form on add new button click
                            // Edit row on edit button click
                            $(document).on("click", ".edit", function(){
                                $(this).parents("tr").find("td:not(:last-child)").each(function(){
                                    $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
                                });
                                $(this).parents("tr").find(".add, .edit").toggle();
                                $(".add-new").attr("disabled", "disabled");
                            });
                            // Delete row on delete button click
                            $(document).on("click", ".delete", function(){
                                $(this).parents("tr").remove();
                                $(".add-new").removeAttr("disabled");
                            });
                        });
                    </script>
                </head>
                <body>
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8"><h2>Films</b></h2></div>
                                <div class="col-sm-4">
                                    <button type="button" onclick="location.href='{{url('/add')}}'" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Release Date</th>
                                <th>Rating</th>
                                <th>Ticket Price</th>
                                <th>Country</th>
                                <th>Genre</th>
                            </tr>
                            </thead>
                            <tbody>

                                @if(count($films) > 0)
                                    @foreach($films->all() as $films)

                                    <tr>
                                        <td>{{ $films->id }}</td>
                                        <td>{{ $films->name }}</td>
                                        <td>{{ $films->description }}</td>
                                        <td>{{ $films->release_date }}</td>
                                        <td>{{ $films->rating }}</td>
                                        <td>{{ $films->ticket_price }}</td>
                                        <td>{{ $films->country }}</td>
                                        <td>{{ $films->genre }}</td>
                                        <td>
                                            <a href="{{ url('films/' . $films->slug) }}" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                </body>
                </html>
            </div>
        </div>
    </div>