@extends('site.layout.menu')

@section('Breadcrumbs','利潤數據庫-瀏覽頁' )

@section('content')
     <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @include('ProfitConversion.layout.edit')




            <!-- Current ProfitConversions -->

			@if (@!$status)

                <div class="panel panel-default">

                        <table class="table table-striped ProfitConversion-table" border="0">
                                <tr>
                                    <th style="font-size: 25px">關鍵字搜尋</th>
                                    <td class="table-text">     
                                    		<form action="{{ url('ProfitConversion/search') }}" method="POST">                               	
                                    		<input type="text" name="search_str" class="form-control" value="{{$search_str}}">                                    	
                                   	</td>
                                    <td  align="right">
            								
            									{{ csrf_field() }}
                								<button type="submit" class="btn btn-success">
                    								<i class="fa fa-btn fa-search"></i> Search
                								</button>
             								</form>
                                    </td>   
                                     <td  align="right">
            								<form action="{{ url('ProfitConversion/search') }}" method="GET">
            									{{ csrf_field() }}
                								<button type="submit" class="btn btn-danger">
                    								<i class="fa fa-btn fa-refresh"></i> Reset
                								</button>
            								</form>
                                    </td>                                
                                </tr>                               				
                        </table>
    
                </div>



            <form action="{{ url('ProfitConversion/add') }}" method="GET">
            	{{ csrf_field() }}
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-plus"></i> 增加物品
                </button>
            </form>
            @endif
            @if (count(@$ProfitConversion_Class) > 0)
                <div class="panel panel-default">

                    <div class="panel-body">
                        <table class="table table-striped ProfitConversion-table" >
                            <thead>
                                <th>名稱</th>
                                <th>價格</th>
                                <th>數量</th>
                                <th width="20%" colspan="2">&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($ProfitConversion_Class as $ProfitConversion_view)
                                    <tr>
                                        <td class="table-text">
                                            <div>
                                                <a href="javascript:void(0)" data-toggle="popover" data-html="true"  data-trigger="hover" data-content="{{ $ProfitConversion_view->rawmaterial }}">
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