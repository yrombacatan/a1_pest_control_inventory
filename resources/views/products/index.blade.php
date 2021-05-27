@extends('layouts.app')
@section('title', 'Products')
@section('css')
<style>
    @media screen {
      #printSection {
          display: none;
      }
    }

    @media print {
      body * {
        visibility:hidden;
      }
      #printSection, #printSection * {
        visibility:visible;
      }
      #printSection {
        position:absolute;
        left:0;
        top:0;
      }
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.content-header')
    <!-- /.content-header -->

    <!-- Content (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card card-primary card-outline">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">List of products in the system. </h3>
                <ul class="nav nav-pills ml-auto p-2">
                    @can('product-create')
                        <a class="btn btn-primary float-right" href="{{ route('products.create') }}">Add New</a>
                    @endcan
                </ul>
              </div><!-- /.card-header -->

              <div class="card-body">

                    <div class="clearfix"></div>
                      @include('flash::message')
                    <div class="clearfix"></div>

                    <div class="row">

                    @include('products.table')

                    </div>

              </div><!-- /.card-body -->

            </div>
            <!-- ./card -->

          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

    </section>
    <!-- /.content -->
    <div id="printThis">
      <div class="modal fade" id="qrcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header ">
              <h5 class="modal-title font-weight-bold" id="productLabel"><i class="fas fa-qrcode"></i></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
              <div class="modal-body d-flex justify-content-center" id="modalBody">
              </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="printButton" class="btn btn-primary"><i class="fas fa-print"></i>  Print</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
  $(function () {
    $('#products-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- qrcode modal -->

<script>

  function showModal(e) {
    let id = $(e).attr('id');
    let productName = $(`#${id} span:first-child`).html();
    let qrcode = $(`#${id} span:last-child`).html();
    $("#productLabel").html('').prepend(productName);
    $("#modalBody").html('').append(qrcode);
    $('#qrcodeModal').modal('show')
  }
  
  $("#printButton").click(function() {
    printElement(document.getElementById("printThis"));
  })

  function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
  }
</script>
@endpush

