@extends('site.layout.menu')

@section('Breadcrumbs','利潤數據庫-瀏覽頁' )

@section('content')
     <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @include('ProfitConversion.layout.edit')




            <!-- Current ProfitConversions -->
			@if (@!$status)
            <form action="{{ url('ProfitConversion/add') }}" method="GET">
            	{{ csrf_field() }}
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-plus"></i> Add ProfitConversion
                </button>
            </form>
            @endif
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
                                        <td class="table-text">
                                            <div>
                                                <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-content="Some content inside the popover">
                                                    {{ $ProfitConversion_view->name }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="table-text"><div>{{ $ProfitConversion_view->price }}</div></td>
                                        <td class="table-text"><div>{{ $ProfitConversion_view->amount }}</div></td>

                                        <!-- ProfitConversion Delete Button -->
            	                            <td >
                                            <form action="{{ url('ProfitConversion/edit/'.$ProfitConversion_view->id) }}" method="GET">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-plus"></i> Edit
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ url('ProfitConversion/del/'.$ProfitConversion_view->id) }}" method="POST">
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


<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();   
    });
</script>

@endsection