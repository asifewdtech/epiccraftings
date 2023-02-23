@extends('layouts.admin')
@section('title','Reviews List')
@section('breadcrumb')
        <li><a href="{{route('reviews.index')}}">Reviews</a></li>
        <li class="active">List</li>
@endsection
@section('content')
    <div class="padd-top"><h3 class="text-center">Reviews</h3></div>
    <div class="pr-4 text-right"><a href="{{route("reviews.create")}}" class="btn btn-info btn-sm" >Create Review</a></div>
    <div class="box-body">
        <div class=" table-responsive">
            <table id="example1" class="table table-bordered table-striped"  data-ordering="false">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Domain</th>
                        <th>Name</th>
                        <th>Rating</th>
                        <th>Image</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if($reviews->count() >0)
                        @foreach($reviews as $key=>$review)

                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $review->domain }}</td>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->rating }}</td>
                                <td> @if($review->picture!='') <img id="myImg" src="{{asset($review->picture)}}" alt="" width="60" height="30" onclick="imagePopUp(this)"> @endif </td>
                                <td>{{ $review->review }}</td>
                                <td>
                                    <a href="{{ route('reviews.edit',$review->id) }}">
                                        <button class="btn btn-inline btn-success btn-sm">Update</button>
                                    </a>
                                    <button class="btn btn-inline btn-danger btn-sm" onclick="delete_resource('{{ route('reviews.destroy',$review->id) }}','{{ route('reviews.index') }}')">Delete</button>
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