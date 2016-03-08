var vm = new Vue({

    el: '.listcontainer',

    data: {
        newItem: {
            id: '',
            title: '',
            completed: '',
            order: ''
        },

        itemAmount: '',

        success: false,
        edit: false
    },

    methods: {
        fetchItem: function () {
            this.$http.get('/api/items', function (data) {
                this.$set('items', data);
                this.itemAmount = data.length;
            });
        },

        EditStatus: function (id) {
            this.newItem = {title: '', completed: '', order: ''};
            var item = '';
            this.$http.get('/api/items/' + id, function (data) {
                if (data.completed == 0) {
                    item = {id: data.id, title: data.title, completed: 1, order: data.order};
                    console.log(item);
                }
                else {
                    item = {id: data.id, title: data.title, completed: 0, order: data.order};
                    console.log(item);
                }
                this.$http.patch('/api/items/' + id, item);
            });
            console.log(this.itemAmount);
            //console.log(this.newItem.completed);
            //this.$http.patch('/api/items/' + id, item);
            this.fetchItem();
        },

        EditItem: function (id) {
            var item = this.newItem;

            this.newItem = {title: '', completed: '', order: ''};
            this.$http.patch('/api/items/' + id, item);
            this.edit = false;
            this.fetchItem();
        },

        RemoveItem: function (id) {
            this.$http.delete('/api/items/' + id);

            //Reload page
            this.fetchItem();
        },

        ShowItem: function (id) {
            this.edit = true;
            this.$http.get('/api/items/' + id, function (data) {
                this.newItem.id = data.id;
                this.newItem.title = data.title;
                this.newItem.completed = data.completed;
                this.newItem.order = data.order;
            });
        },

        AddNewItem: function () {
            this.newItem.completed = false;
            this.newItem.order = this.itemAmount;

            //User input
            var item = this.newItem;

            //Send post request
            this.$http.post('/api/items', item);

            //Clear form
            this.newItem = {title: '', completed: '', order: ''}

            //Reload page
            this.fetchItem();
        },

    },

    computed: {
        validation: function () {
            return {
                title: !!this.newItem.title.trim()
            }
        },

        isValid: function () {
            var validation = this.validation;
            return Object.keys(validation).every(function (key) {
                return validation[key];
            })
        }
    },

    watch: {},

    ready: function () {
        this.fetchItem();
    }
});