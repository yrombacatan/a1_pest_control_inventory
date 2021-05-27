@extends('layouts.app')
@section('title', 'Products QR Codes')
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
                <h3 class="card-title p-3">List of qrcodes in the system. </h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <button class="btn btn-primary float-right" id="printButton"><i class="fas fa-print"></i> Print</button>
                </ul>
              </div><!-- /.card-header -->

              <div class="card-body">

                    <div class="row">

                        @if ($products->count() < 1)
                            <span class="text-warning">No records.</span>
                        @endif

                        <div id="printThis">
                            <div class="d-flex flex-wrap justify-content-center" id="qrcodes">
                                @include('qrcodes.table')
                            </div>
                        </div>
                    </div>

                    {{ $products->links() }}

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

</div>
@endsection

@push('scripts')
<script>
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
