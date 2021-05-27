@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Supplier Contact
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($supplierContact, ['route' => ['supplierContacts.update', $supplierContact->id], 'method' => 'patch']) !!}

                        @include('supplier_contacts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection