@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-lg-8 col-md-offset-3 col-lg-offset-3">
        <div class="panel panel-primary ">
            <div class="panel-heading">Companies
                <a class="pull-right btn btn-primary btn-sm" href="/companies/create">
                    Add <i class="fa fa-plus" aria-hidden="true"></i>
                </a>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($companies as $company)
                        <li class="list-group-item"><a href="/companies/{{ $company->id}}">{{$company->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="container-fluid">
            <h3 align="center"> Datatables Jquery Plugin with Bootstrap</h3>
            <br/>
            <div class="table-responsive">
                <table id="users_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Created at</td>
                        <td>Updated at</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td><a href="/companies/{{ $company->id}}">
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>edit</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

