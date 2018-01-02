@extends('layouts.app')
@section('content')

    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left" style="background:white">
        <h1> Create new project </h1>
        <!-- Example row of columns -->
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin : 10px">

            <form method="post" action="{{ route('companies.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="project-name">Name<span class="required">*</span></label>
                    <input placeholder="Enter name"
                           id="project-name"
                           required
                           name="name"
                           spellcheck="false"
                           class="form-control"
                    />
                </div>

                @if($companies == null)
                    <input class="form-control" name="company_id" type="hidden" value="{{$company_id}}"/>
                @endif
                @if($companies != null)
                    <div class="form-group">
                        <label for="select-company">Select company </label>
                        <select name="company_id" class="form-control">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach

                        </select>

                    </div>
                @endif

                <div class="form-group">
                    <label for="project-content">Description</label>
                    <textarea placeholder="Enter description"
                              style="resize: vertical"
                              id="project-content"
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

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </div>
@endsection