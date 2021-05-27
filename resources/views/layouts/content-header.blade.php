    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">{{ Request::is('home*') ? 'Dashboard' : preg_replace('/(?<!\ )[A-Z]/', ' $0', ucwords(Request::segment(1))) }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                @if (Request::is('home*'))
                @else
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                @endif
                <?php $link = "" ?>
                @for($i = 1; $i <= count(Request::segments()); $i++)
                    @if($i < count(Request::segments()) & $i > 0)
                    <?php $link .= "/" . Request::segment($i); ?>
                    <li class="breadcrumb-item"><a href="<?= $link ?>">{{ preg_replace('/(?<!\ )[A-Z]/', ' $0', ucwords(str_replace('-',' ',Request::segment($i)))) }}</a></li>
                    @else <li class="breadcrumb-item active">{{ preg_replace('/(?<!\ )[A-Z]/', ' $0', ucwords(str_replace('-',' ',Request::segment($i)))) }}</li>

                    @endif
                @endfor
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
