@extends('app')

@section('content')
    <div id="ItemsController">

        <div class="alert alert-danger" v-if="!isValid">
            <ul>
                <li v-show="!validation.title">Title field is required</li>
                <li v-show="!validation.description">Description field is required</li>
            </ul>
        </div>

        <form action="#" @submit.prevent="AddNewItem" method="POST">
            <div class="form-group">
                <label for="name">Title:</label>
                <input v-model="newItem.title" type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input v-model="newItem.description" type="text" id="description" name="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="completed">Completed:</label>
                <input v-model="newItem.completed" type="checkbox" id="completed" name="completed" class="form-control">
            </div>
            <div class="form-group">
                <label for="order">Order:</label>
                <input v-model="newItem.order" number type="text" id="order" name="order" class="form-control">
            </div>


            <div class="form-group">
                <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="!edit">Add New Item</button>
                <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="edit" @click="EditItem(newItem.id)">Edit Item</button>
            </div>
        </form>

        <div class="alert alert-success" transition="success" v-if="success">Add new item succesful.</div>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>TITLE</th>
            <th>DESCRIPTION</th>
            <th>COMPLETED</th>
            <th>ORDER</th>
            <th>CONTROLLER</th>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td>@{{ item.id }}</td>
                <td>@{{ item.title }}</td>
                <td>@{{ item.description }}</td>
                <td>@{{ item.completed }}</td>
                <td>@{{ item.order }}</td>
                <td>
                    <button class="btn btn-default btn-sm" @click="ShowItem(item.id)">EDIT</button>
                    <button class="btn btn-danger btn-sm" @click="RemoveItem(item.id)">REMOVE</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="/js/script.js"></script>

    <style>
        .success-transition {
            transition: all .5s ease-in-out;
        }

        .success-enter, .success-leave {
            opacity: 0;
        }
    </style>
@endpush