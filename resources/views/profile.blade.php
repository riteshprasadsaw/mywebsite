@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            
            <div class="panel panel-default">
            <div class="panel-heading"><b>Update Profile</b></div>
            <div class="panel-body">

       
            <img src="/images/{{$user->avatar}}" style="width: 150px;height: 150px; float: left;border-radius: 50%; margin-right: 25px">

            <h2>{{$user->name}} 's Profile</h2>

            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <!-- <input type="submit" class="btn btn-lg btn-primary"> -->
                <button type="submit" class="pull-right btn btn-lg btn-primary">Update Profile </button>
            </form>
        
        </div>
        </div>
        </div>
        </div>
      


       

   

     <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="panel panel-default">
            <div class="panel-heading"><b>Delete Profile</div>
            <div class="panel-body">

            <div>
             <form method="POST" action="/profile/{{$user->id}}">
                
                 {{csrf_field()}}
                 <!-- <input name="delete profile" type="submit" class="btn btn-link"> -->
                 <h5> Are you sure you want to delete your account?</h5>
                 <button type="submit" class="btn btn-lg btn-danger">Delete Profile </button>
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>


</div>

@endsection
