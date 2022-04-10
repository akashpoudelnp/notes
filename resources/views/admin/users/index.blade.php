@extends('admin.master')
@section('title','Users')
@section('header')
<div class="flex flex-row justify-between">
    <h3>Authentication : Users</h3>
    <a href="{{url('admin/users/create')}}" class="text-sm bg-teal-600 hover:bg-teal-500 text-white rounded-md px-2 my-1 mr-4">Add New +</a>
</div>
@endsection
@section('content')
            <div>
                <table class=" bg-white rounded-sm w-full h-full">
                    <thead class="bg-teal-700 text-white rounded-t-md">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="text-center border-2 border-b-gray-100">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td class="flex flex-row ">
                                    <a href="{{url("admin/users/$user->id/edit")}}">✏️</a>
                                    <form method="POST" action="{{route('admin.users.destroy',$user->id)}}">
                                      @method('DELETE')
                                        @csrf
                                        <button>🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    No Users
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
@endsection