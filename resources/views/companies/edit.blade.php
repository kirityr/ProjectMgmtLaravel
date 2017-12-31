@extends('layouts.app')
@section('content')

    <div class="col-md-9 col-lg-9 pull-left">

        <!-- Example row of columns -->
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin : 10px">

            <form method="post" action="{{ route('companies.update',[$company->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="company-name">Name<span class="required">*</span></label>
                    <input placeholder="Enter name"
                           id="company-name"
                           required
                           name="name"
                           spellcheck="false"
                           class="form-control"
                           value="{{ $company->name }}"
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
                                          {{ $company->description }}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
@endsection