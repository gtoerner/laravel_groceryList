@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Grovery Items Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if (count($grocery_items) > 0)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Current Grocery Items
                                    </div>

                                    <div class="panel-body">
                                        <table class="table table-striped task-table">
                                            <thead>
                                            <th>Grocery Items:</th>
                                            <th>&nbsp;</th>
                                            </thead>
                                            <tbody>
                                            @foreach ($grocery_items as $item)
                                                <tr>
                                                    <td class="table-text"><div>{{ $item->name }}</div></td>

                                                    <!-- Task Delete Button -->
                                                    <td>
                                                        <form action="{{ url('grocer/'.$item->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}

                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa fa-btn fa-trash"></i>Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        No Grocery Items in List
                                    </div>
                                </div>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection