@extends('welcome')

@section('content')
<div class="content">
    <section class="home-section">
        <div class="action-section">
            <div class="text section-title">Forms</div>
            <div class="action-buttons">
                <a href="{{route('forms.create')}}">
                    <button type="button" class="btn btn-success">New Form</button>
                </a>

            </div>
        </div>
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">e-mail</th>
                <th scope="col">role id</th>
                <th scope="col">created at</th>
                <th scope="col">updated at</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
{{--            @foreach($users as $user)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$user->id}}</th>--}}
{{--                    <td>{{$user->name}}</td>--}}
{{--                    <td>{{$user->email}}</td>--}}
{{--                    <td>{{$user->role_id}}</td>--}}
{{--                    <td>{{$user->created_at}}</td>--}}
{{--                    <td>{{$user->updated_at}}</td>--}}
{{--                    <td>--}}
{{--                        <div class="dropdown">--}}
{{--                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"--}}
{{--                                    data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                Actions--}}
{{--                            </button>--}}
{{--                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}

{{--                                <li>--}}
{{--                                    <a class="dropdown-item">Detail Page</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a type="submit" class="dropdown-item">Edit</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <form action="{{route('admin.user.destroy',[$user->id])}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button type="submit" class="dropdown-item">Delete</button>--}}
{{--                                    </form>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </td>--}}

{{--                </tr>--}}
{{--            @endforeach--}}
            </tbody>
        </table>
{{--        {{$users->links()}}--}}
    </section>
</div>
@endsection
