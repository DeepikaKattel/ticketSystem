@extends('adminPanel.master')
@section('rightContent')
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
    <div class="container-fluid">
        <div class="row justify-content-center ml-5">
            <div class="col-xs-20 col-md-15 col-lg-12 mx-5">
            <h1>Routes</h1>
                <form>
                    <label>Show</label>
                    <select id="pagination">
                        <option selected>---</option>
                        <option value="http://127.0.0.1:8000/setLimit/5" >5</option>
                        <option value="http://127.0.0.1:8000/setLimit/10" >10</option>
                        <option value="http://127.0.0.1:8000/setLimit/all" >All</option>
                    </select>
                    <label>entries</label>
                </form>
            <a href="{{route('route.create')}}" class="btn btn-info float-right" style="margin-bottom: 10px">Add Routes</a>
            <table class="table">
                <thead class="thead-dark">
                <tr style="font-size: 14px">
                    <th scope="col">S.N</th>
                    <th scope="col">Route Name</th>
                    <th scope="col">Stoppage Points</th>
                    <th scope="col">Distance Travel Time</th>
                    <th scope="col">Children Seat</th>
                    <th scope="col">Special Seat</th>
                    <th scope="col">Status</th>
                    <th scope="col" id="none">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($route as $r)
                    <tr style="font-size: 14px">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$r->start_point}} - {{$r->end_point}}</td>
                        <td>{{$r->stoppage_points}}</td>
                        <td>{{$r->distance}}</td>
                        <td>{{$r->child_seat}}</td>
                        <td>{{$r->special_seat}}</td>
                        <td id="none">@if($r->status==0) <span style="color:red;font-weight: bold">Inactive</span> @else <span style="color:green;font-weight: bold">Active</span> @endif</td>
                        <td id="none"><a href="{{route('statusr', ['id'=>$r->id])}}" style="font-weight: bold">@if($r->status==1)<button class="btn-sm btn-primary btn-danger"> Inactive </button>@else<button class="btn-sm btn-primary btn-success"> Active </button>@endif</a>
                            <a href="{{route('route.edit',$r->id)}}"><i class="fa fa-lg fa-edit"></i></a>
                            @method('DELETE')
                            <a onclick="return confirm('Do you want to delete')" href="{{route('r.destroy',$r->id)}}"><i class="fa fa-lg fa-minus-circle" style="color:red"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                {!!$route->links()!!}
            </div>
        </div>
    </div>
    <script>
        $(function(){
            // bind change ernt to select
            $('#pagination').on('change', function () {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });
        });
    </script>
@endsection

