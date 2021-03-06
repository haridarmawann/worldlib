@extends('layout.admin')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Type</h1>
      <a href="{{ route('type.create') }}" class="btn btn-primary">
        <i class="fas fa-plus text-white"> Add Type</i>
       </a>
       
    
  </div>
  {{-- Table country --}}
  
  <div class="row">
    <div class="card-body">
        
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @elseif (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
    <div class="table-responsive col-4">
        <table class="table" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            @forelse ($types as $type)
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $type->type }}</td>
                    <td>
                        <a href="{{ route('type.edit',$type->id)}}" class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('type.destroy',$type->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                
            @empty
            <tbody>
                <tr>
                    <td colspan="7" class="text-center">
                        Data Kosong
                    </td>
                </tr>
                
            @endforelse
            </tbody>
           
        
             
        </table>
      </div>
    </div>
      
  </div>
  

 

  

</div>
<!-- /.container-fluid -->
@endsection
