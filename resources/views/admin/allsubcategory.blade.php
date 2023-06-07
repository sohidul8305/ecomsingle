@extends('admin.layouts.template')
@section('page_title')
All Sub Category - single Ecom
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span>All Sub Category</h4>
                  <!-- Bootstrap Table with Header - Light -->
                  @if(session()->has('message'))
                  <div class="alert alert-success">
                 {{ session()->get('message') }}
                  </div>
                       @endif
                  <div class="card">
                    <h5 class="card-header">Available Sub category Information</h5>
                    <div class="table-responsive text-nowrap">
                      <table class="table">
                        <thead class="table-light">
                          <tr>
                            <th>Id</th>
                            <th>Sub Category Name</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          <tr>
                            @foreach ($allsubcategories as $subcategory )
                                <td>{{$subcategory->id}}</td>
                                <td>{{$subcategory->subcategory_name}}</td>
                                <td>{{$subcategory->category_name}}</td>
                                <td>{{$subcategory->product_count }}</td>
                                <td>
                                    <a href="{{ route('editsubcat',$subcategory->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletesubcat',$subcategory->id) }}" class="btn btn-warning">Delete</a>
                                </td>
                                @endforeach
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- Bootstrap Table with Header - Light -->
</div>
@endsection




