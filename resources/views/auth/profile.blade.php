<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> 

    <!-- Styles -->
    <style>
        h4, h6 {
            margin: 10px 0px 10px 0px !important;;
        }

        h4 {
            text-align: center;
            margin: 30px 0px 30px 0px !important;
            font-weight: bold;
        }

        .col-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%;
            float: right;
            width: 66.66%;
        }

        .col-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }

        .col-form-label {
            padding-top: calc(.375rem + 1px);
            padding-bottom: calc(.375rem + 1px);
            margin-bottom: 0;
            font-size: inherit;
            line-height: 1.5;
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 1rem;
            margin-top: 100px;
            margin-bottom: 50px;
        }

        .row {
            margin-right: 5px;
            margin-left: 5px;
        }

        .snippet {
            margin-top: 100px;
        }

        input, textarea, select {
            pointer-events: none;
        }
    </style>
</head>
<body>
<div class="container bootstrap snippet">

    <div class="row">
        <div class="col-sm-3"><!--left col-->


            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                     alt="avatar">
                <h6>Upload a different photo...</h6>
                <input type="file" class="text-center center-block file-upload">
            </div>
            </hr><br>


            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
            </div>




            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i
                        class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                        class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>

        </div><!--/col-3-->

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Your Profile</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">Name*</label>
                                    <div class="col-8">
                                        <input value="@if(Session::has('auth')){{Session::get('auth')->name}}@endif" id="username" name="name" placeholder="Username"
                                               class="form-control here" required="required" type="text">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <div  class="form-control here" >@if(Session::has('auth')){{Session::get('auth')->email}}@endif</div>
                                    </div>
                                </div>






                                <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Phone</label>
                                    <div class="col-8">
                                        <input value="@if(Session::has('auth')){{Session::get('auth')->phone}}@endif" id="lastname" name="lastname" placeholder="Phone"
                                               class="form-control here" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="select" class="col-4 col-form-label">Gender</label>
                                    <div class="col-8">
                                        <select id="select" name="select" class="custom-select form-control here">
                                            @if(Session::has('auth'))
                                                <option value="">{{Session::get('auth')->gender}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Date Of Birth</label>
                                    <div class="col-8">
                                        <input value="@if(Session::has('auth')){{Session::get('auth')->dateofbirth}}@endif" id="lastname" name="dateofbirth" placeholder="Date Of Birth"
                                               class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Student Code</label>
                                    <div class="col-8">
                                        <input value="@if(Session::has('auth')){{Session::get('auth')->studentcode}}@endif" id="lastname" name="studentcode" placeholder="Student Code"
                                               class="form-control here" type="text">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary"> <a href="{{route('editprofile')}}"> Update My
                                                Profile</a>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div><!--/col-9-->
</div><!--/row-->
</body>
</html>




