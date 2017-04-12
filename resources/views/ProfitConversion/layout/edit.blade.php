@if (@$status)
            <div class="panel panel-default">
                <div class="panel-heading" style="color:#000;font-family:monospace">
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

                        @if (count(@$ProfitConversion_edit) > 0)
                        <div class="form-group">
                            <input type="hidden" name="rawmaterial" value="{{$ProfitConversion_edit->rawmaterial or old('rawmaterial') }}">
                            <label for="ProfitConversion-rawmaterial" class="col-sm-6 control-label">原料及價錢</label>
   
                                <button type="button" id='add_rawmaterial' class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i> Add
                                </button>

                        </div>
                         <div id="showBlock"></div>

                        
                         @for($i=0; $i < count(@$rawmaterialData); $i++)
                                <input type="hidden" name="GetRawmaterialData[{{$i}}][name]" value="{{$rawmaterialData[$i]['name']}}">                    
                                <input type="hidden" name="GetRawmaterialData[{{$i}}][price]" value="{{$rawmaterialData[$i]['price']}}">       
                         @endfor
                        @endif

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



<script type="text/javascript">
  var txtId = 0;
    $( document ).ready(function() {

        var RawmateriaDataCount={{count(@$rawmaterialData)}};
        if(RawmateriaDataCount > 1){
            for ( i = 1; i <= RawmateriaDataCount; i++) {
                $("#showBlock").append(AddRawmaterialDiv(txtId));
                txtId=i;
            }
        }



    });

  $("#add_rawmaterial").click(function () {
      $("#showBlock").append(AddRawmaterialDiv(txtId));
      txtId++;
  });

 $("#showBlock").delegate("#del_rawmaterial", "click", function() {
    var Del_Id='#' + $(this).val();
    $(Del_Id).remove();
 });

function AddRawmaterialDiv(txtId){
    var ret,GetName , GetPrice;
    var add_id='rawmaterial_div' + txtId ;
    GetName = $("input[type=hidden][name='GetRawmaterialData["+txtId+"][name]']").val();
    GetName = (GetName) ? GetName : "" ;
    GetPrice = $("input[type=hidden][name='GetRawmaterialData["+txtId+"][price]']").val();
    GetPrice = (GetPrice) ? GetPrice : "";

    ret ='<div id="' + add_id + '" class="form-group">'
                +'<label for="ProfitConversion-rawmaterial" class="col-sm-3 control-label">原料</label>'
                +'<div class="col-sm-2"><input type="text" name="rawmaterial['+txtId+'][name]" value="'+GetName+'" id="ProfitConversion-count" class="form-control"></div>'
                +'<label for="ProfitConversion-rawmaterial" class="col-sm-2 control-label">價錢</label>'
                +'<div class="col-sm-2"><input type="text" name="rawmaterial['+txtId+'][price]" value="'+GetPrice+'" id="ProfitConversion-count" class="form-control" ></div>'
                +' <button type="button" id="del_rawmaterial" value="' + add_id +'" class="btn btn-danger"><i class="fa fa-btn fa-ban"></i> Del</button>'
        +'</div>';
    return ret;
}

</script> 




@endif
