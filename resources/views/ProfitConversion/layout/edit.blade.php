        	@if (@$status)
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
                       <div class="form-group">
                            <label for="ProfitConversion-count" class="col-sm-3 control-label">count</label>
                            <div class="col-sm-6">
                                <input type="text" name="count" id="ProfitConversion-count" class="form-control" value="{{$ProfitConversion_edit->count or old('count') }}">
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
            @endif