@extends('site.layout.menu')

@section('Breadcrumbs','利潤換算庫-瀏覽頁' )

@section('content')
     <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New ProfitConversion
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    <!-- New ProfitConversion Form -->
                    <form action="{{ url('ProfitConversion')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- ProfitConversion Name -->
                        <div class="form-group">
                            <label for="ProfitConversion-name" class="col-sm-3 control-label">ProfitConversion</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="ProfitConversion-name" class="form-control" value="{{ old('ProfitConversion') }}">
                            </div>
                        </div>

                        <!-- Add ProfitConversion Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add ProfitConversion
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Current ProfitConversions -->
<?php

?>
            @if (count($ProfitConversions) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current ProfitConversions
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped ProfitConversion-table">
                            <thead>
                                <th>ProfitConversion</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($ProfitConversions as $ProfitConversion)
                                    <tr>
                                        <td class="table-text"><div>{{ $ProfitConversion->name }}</div></td>

                                        <!-- ProfitConversion Delete Button -->
                                        <td>
                                            <form action="{{ url('ProfitConversion/'.$ProfitConversion->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection