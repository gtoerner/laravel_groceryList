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

                            <form method="POST" action="{{ url('/groceryitems')}}" accept-charset="UTF-8">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">New Item:</label>
                                    <input class="form-control" name="name" type="text" id="name">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Add Item!">
                                </div>
                            </form>
                            <hr>
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
                                                    <td class="table-text">
                                                        @if ($item->isActive == 1)
                                                            <div style="color:rgb(255,43,193)">
                                                                {{ $item->name }}
                                                            </div>
                                                        @else
                                                            <div>
                                                                {{ $item->name }}
                                                            </div>
                                                        @endif
                                                    </td>

                                                    <!-- Task Delete Button -->
                                                    <td>
                                                        <form action="{{action('GroceryItemsController@addToList', $item['id'])}}" method="POST" >
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa fa-btn fa-trash"></i>Add to List
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