@extends('layouts.admin')
@section('title','Products List')
@section('breadcrumb')
        <li><a href="{{route('products.index')}}">Products</a></li>
        <li class="active">List</li>
@endsection
@section('content')
    <div class="padd-top"><h3 class="text-center">Products</h3></div>
    <div class="pr-4 text-right"><a href="{{route("products.create")}}" class="btn btn-info btn-sm" >Create Product</a></div>
    <div class="box-body">
        <div class=" table-responsive">
            <table id="example1" class="table table-bordered table-striped"  data-ordering="false">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Min price</th>
                        <th>Max price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if($products->count() >0)
                        @foreach($products as $product)

                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img id="myImg" src="{{asset($product->image)}}" alt="" width="60" height="30" onclick="imagePopUp(this)">
                                </td>
                                <td>{{ $product->category_id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->size }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->min_price }}</td>
                                <td>{{ $product->max_price }}</td>
                                <td>
                                    <a href="{{ route('products.show',$product->id) }}">
                                        <button class="btn btn-inline btn-info btn-sm">View</button>
                                    </a>
                                    <a href="{{ route('products.edit',$product->id) }}">
                                        <button class="btn btn-inline btn-success btn-sm">Update</button>
                                    </a>
                                        <button class="btn btn-inline btn-danger btn-sm" onclick="delete_resource('{{ route('products.destroy',$product->id) }}','{{ route('products.index') }}')">Delete</button>
                                </td>
                            </tr>

                        @endforeach 
                    @endif
                
                </tbody>
            </table>
        </div>
    </div><!-- /.box-body -->

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()"><i class="fa fa-close"></i></span>
        <img class="modal-content" id="img01">
    </div>
    <!-- The Modal -->
@endsection
@section('script')

<script>
    
    var modal = document.getElementById("myModal");
    function imagePopUp(e){
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        modal.style.display = "block";
        modalImg.src = e.src;
    }
    const closeModal = ()=>{
        myModal.removeAttribute('style');
    }

// Get the modal

// // Get the image and insert it inside the modal - use its "alt" text as a caption
// var img = document.getElementById("myImg");
// var modalImg = document.getElementById("img01");
// img.onclick = function() {
//     modal.style.display = "block";
//     modalImg.src = this.src;
// }

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }
</script>
@endsection