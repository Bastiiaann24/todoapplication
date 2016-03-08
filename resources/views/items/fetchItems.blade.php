@extends('app')

@section('content')

    <div class="listcontainer">
        <form action="#" @submit.prevent="AddNewItem" method="POST">
            <div>
                <input type="text" name="task" placeholder="Add a new task" v-model="newItem.title"
                       required="required"/>
                <button :disabled="!isValid" type="submit">Add task</button>
            </div>
        </form>
        <ul>
            <li v-for="item in items">
                <span class="fa fa-ellipsis-v"></span>
                <span class="item--title" v-bind:class=" {done: item.completed}">@{{ item.title }}
                </span>
                    <input type="checkbox" name="listCheckbox" id="listCheckbox" v-model="item.completed"
                           v-bind:true-value=1
                           v-bind:false-value=0>
                    <label v-model="item.completed" v-on:click="EditStatus(item.id)"></label>
                <span class="fa fa-trash-o" @click="RemoveItem(item.id)"></span>
            </li>
        </ul>
    </div>
@endsection

@push('scripts')
<script src="/js/script.js"></script>
@endpush