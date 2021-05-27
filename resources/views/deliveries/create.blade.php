@extends('layouts.app')
@section('title', 'Add Delivery')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.content-header')
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card card-primary card-outline">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Add new deliveries to the system. </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

                @include('adminlte-templates::common.errors')
                    <div class="clearfix"></div>

                    {!! Form::open(['route' => 'deliveries.store', 'class' => '', 'id' => 'deliveriesForm']) !!}

                        @include('deliveries.fields')

              </div><!-- /.card-body -->
              <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('deliveries.index') !!}" class="btn btn-default">Cancel</a>
              </div>
              {!! Form::close() !!}
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->
    </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){

        calcTotal();

        var item_id = "";
        var item_sku = "";
        var item_name ="";
        var item_unit = "";
        var item_price = "";
        var item_ttl = 0;

        $("select.selectItems").change(function() {
            item_id = $("select.selectItems").find(":selected").data("id");
            item_sku = $("select.selectItems").find(":selected").data("sku");
            item_name = $("select.selectItems").find(":selected").data("name");
            item_unit = $("select.selectItems").find(":selected").data("unit_type");
            item_price = $("select.selectItems").find(":selected").data("price");

            $("#itemid").val(item_id);
            $("#itemunit").val(item_unit);
        });

        // Add row to the table
        $(".add-row").click(function(){

            if( $.trim($('#product_id').val()) == '' && $.trim($('#itemqty').val()) == '' ){
                $("#product_id").addClass('is-invalid');
                $("#itemunit").addClass('is-invalid');
                $("#itemqty").addClass('is-invalid');
                $("#itemprice").addClass('is-invalid');

                $("#err_ItemNo").css('display', 'block');
                $("#err_ItemUnit").css('display', 'block');
                $("#err_ItemQty").css('display', 'block');
                $("#err_ItemPrice").css('display', 'block');
            }else if($.trim($('#product_id').val()) == ''){
                $("#product_id").addClass('is-invalid');
                $("#err_ItemNo").css('display', 'block');
            }else if($.trim($('#itemunit').val()) == ''){
                $("#itemunit").addClass('is-invalid');
                $("#err_ItemUnit").css('display', 'block');
            }else if($.trim($('#itemqty').val()) == ''){
                $("#itemqty").addClass('is-invalid');
                $("#err_ItemQty").css('display', 'block');
            }else if($.trim($('#itemprice').val()) == ''){
                $("#itemprice").addClass('is-invalid');
                $("#err_ItemPrice").css('display', 'block');
            }else{
                var item_id = $("#itemid").val();
                var itemqty = $("#itemqty").val();
                var itemunit = $("#itemunit").val();
                var item_buying_prc = $("#itemprice").val();
                item_ttl = (itemqty*item_buying_prc);
                var markup = "<tr><td class='text-center'><a href='' class='delete-row btn btn-danger btn-block btn-xs' title='Remove'><i class='fas fa-times'></i></a><input type='hidden' readonly name='item_id[]' value='" + item_id + "'></td><td><input type='text' class='form-control input-borderless' readonly name='item_code[]' value='" + item_sku + "'></td><td><input type='text' class='form-control input-borderless' readonly name='item_name[]' value='" + item_name + "'></td><td class='text-right'><input type='text' class='colUnit text-right form-control input-borderless' readonly name='item_unit[]' value='" + itemunit + "'></td><td class='text-right'><input type='number' class='colQty text-right form-control input-borderless' readonly name='item_qty[]' value='" + itemqty + "'></td><td class='text-right'><input type='number' class='colPrc text-right form-control input-borderless' readonly name='item_prc[]' value='" + item_buying_prc + "'></td><td class='text-right'><input type='number' class='colTtl text-right form-control input-borderless' readonly name='item_ttl_prc[]' value='" + item_ttl.toFixed(2) + "'></td></tr>";
                $("table tbody").append(markup);
                $("#product_id").val([]);
                $("#itemid").val("");
                $("#itemqty").val("");
                $("#itemunit").val("");
                $("#itemprice").val("");
                $("#err_ItemNo").css('display', 'none');
                $("#err_ItemUnit").css('display', 'none');
                $("#err_ItemQty").css('display', 'none');
                $("#err_ItemPrice").css('display', 'none');

                calcTotal();
            }
        });

        $("tbody").delegate('.colQty, .colPrc',
            function(){
                var tr = $(this).parent().parent();
                var qty = ('.colQty').val();
                var prc = ('.colPrc').val();
                var amt = (qty*prc);
                $('.colTtl').val(amt);
        });

    });

    // Calculates the total items in the table
    function calcTotal() {
        var grandTotal = 0;
     
        $(".colTtl").each(function () {
            grandTotal += parseFloat($(this).val());
        });
        $('.grdtot').val(grandTotal.toFixed(2));
    };


    // Find and remove selected table rows
    $(document).on('click', '.delete-row', function () {
        $(this).closest('tr').remove();
        calcTotal();

        return false;
    });


</script>

<script type="text/javascript">
$(document).ready(function () {
  $('#deliveriesForm').validate({
    rules: {
      ref_no: {
        required: true,
      },
      transac_date: {
        required: true,
      },
      supplier_id: {
        required: true
      },
    },
    messages: {
      ref_no: {
        required: "Please enter reference number",
      },
      transac_date: {
        required: "Please enter transaction date",
      },
      supplier_id: {
        required: "Please select Supplier",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group div').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endpush
