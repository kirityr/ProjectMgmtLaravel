@extends('layouts.app')
@section('content')

    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left" style="background:white">
        <h1 class="text-left"> Create new company </h1>
        <!-- Example row of columns -->
        <div class="row col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white; margin : 10px">

            <form method="post" action="{{ route('companies.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="company-name">Name<span class="required">*</span></label>
                    <input placeholder="Enter name"
                           id="company-name"
                           required
                           name="name"
                           spellcheck="false"
                           class="form-control"
                    />
                </div>

                <div class="form-group">
                    <label for="company-content">Description</label>
                    <textarea placeholder="Enter description"
                              style="resize: vertical"
                              id="company-content"
                              name="description"
                              rows="5" spellcheck="false"
                              class="form-control autosize-target">
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>

    <div class="col-sm-3 col-md-3  col-lg-3 pull-right">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="{{route('companies.index')}}">My companies</a></li>
            </ol>
        </div>
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

@endsection