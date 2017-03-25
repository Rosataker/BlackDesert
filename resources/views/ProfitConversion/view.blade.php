@extends('site.layout.menu')

@section('Breadcrumbs','利潤換算庫-瀏覽頁' )

@section('content')
     <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="color:#000;font-family:monospace">
                    New ProfitConversion
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    <!-- New ProfitConversion Form -->
                    @if (count(@$ProfitConversion_edit) > 0)
                		@foreach ($ProfitConversion_edit as $ProfitConversion_edit)
                		@endforeach               	
                    @endif


                    <form action="{{ url('ProfitConversion')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- ProfitConversion Name -->
                        <div class="form-group">
                            <label for="ProfitConversion-name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="ProfitConversion-name" class="form-control" value="{{ $ProfitConversion_edit->name or old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ProfitConversion-price" class="col-sm-3 control-label">price</label>
                            <div class="col-sm-6">
                                <input type="text" name="price" id="ProfitConversion-price" class="form-control" value="{{$ProfitConversion_edit->price or old('price') }}">
                            </div>                            
                        </div>
                       <div class="form-group">
                            <label for="ProfitConversion-amount" class="col-sm-3 control-label">amount</label>
                            <div class="col-sm-6">
                                <input type="text" name="amount" id="ProfitConversion-amount" class="form-control" value="{{$ProfitConversion_edit->amount or old('amount') }}">
                            </div>                            
                        </div>

                        <!-- Add ProfitConversion Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">   
                                    <input type="hidden" name="id" value="{{ @$ProfitConversion_edit->id }}">                           
                                	<button type="submit" class="btn btn-primary">
                                    	<i class="fa fa-btn fa-plus"></i>  {{$button_str or 'Add ProfitConversion' }}
                                	</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Current ProfitConversions -->
            @if (count(@$ProfitConversion_Class) > 0)

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current ProfitConversions
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped ProfitConversion-table" >
                            <thead>
                                <th>name</th>
                                <th>price</th>
                                <th>amount</th>
                                <th width="20%" colspan="2">&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($ProfitConversion_Class as $ProfitConversion_view)
                                    <tr>
                                        <td class="table-text"><div>{{ $ProfitConversion_view->name }}</div></td>
                                        <td class="table-text"><div>{{ $ProfitConversion_view->price }}</div></td>
                                        <td class="table-text"><div>{{ $ProfitConversion_view->amount }}</div></td>

                                        <!-- ProfitConversion Delete Button -->
                                        <td >
                                            <form action="{{ url('ProfitConversion/'.$ProfitConversion_view->id) }}" method="GET">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-plus"></i> Edit
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ url('ProfitConversion/'.$ProfitConversion_view->id) }}" method="POST">
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
                                                
                        {!! $ProfitConversion_Class->links() !!}                        
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection