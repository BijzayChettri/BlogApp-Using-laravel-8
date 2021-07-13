
@extends('layouts.app')
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <table class="table caption-top">
                <caption>List of Blogs</caption>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Blogger Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                @if($posts->count() > 0)
                @foreach($posts as $posts)
                    <tr>
                    <th scope="row">{{ $posts->id }}</th>
                    <td>{{ $posts->title }}</td>
                    <td>{{ $posts->user->name }}</td>
                    <td>{{ $posts->created_at }}</td>
                    <td>
                    <select name="status" id="describe" data-postId="{{ $posts->id }}" class="form-control-sm form-control" onchange="getval(this);">
                    <option class="status" data-postId="{{ $posts->id }}"   value="{{ $posts->is_approved }}"
                     @if($posts->is_approved == 0) selected @endif>Pending </option> 
                    <option  class="status"  data-postId="{{ $posts->id }}" value="{{ $posts->is_approved }}"
                    @if($posts->is_approved == 1) selected @endif>Approved </option> 
                    <!-- <option>{{ $posts->is_approved ==0 ? 'Pending' : 'Approved'}}</option> -->
                    </select>
                    </td>
                    </tr>
                    
                    @endforeach
                @else
                <h1>No Post yet. Be the first :)</h1>
                @endif
                </tbody>
                </table>
        </div>
    </div>
</div>

<script type="text/javascript">

function getval(sel)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  var opt = sel.options[sel.selectedIndex];
  var postId = opt.dataset.postid
  var statusVal = sel.value
     $.ajax({
           type:'POST',
           url: "{{ route('admin.updatePost') }}",
            // url: 'admin/updatePost',
            data : {
                statusVal : statusVal,
                postId : postId

            },
            success:function(data){
                // $('#equipes').html(data);
                console.log('ssuccess')
            }
        });
}

</script>
@endsection
