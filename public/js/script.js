var vm = new Vue({

    el: '.listcontainer',

    data: {
        newItem: {
            id: '',
            title: '',
            completed: '',
            order: ''
        },

        //items: [],

        itemAmount: '',

        success: false,
        edit: false,

        draggingItem: undefined
    },

    methods: {
        fetchItem: function () {
            this.$http.get('/api/items', function (data) {
                console.log(data);
                this.$set('items', data);
                setTimeout(function () {
                    console.log(vm.items);
                    this.itemAmount = data.length;
                }, 2000);
            });
        },

        EditStatus: function (id) {
            this.newItem = {title: '', completed: '', order: ''};
            var item = '';
            this.$http.get('/api/items/' + id, function (data) {
                if (data.completed == 0) {
                    item = {id: data.id, title: data.title, completed: 1, order: data.order};
                    //console.log(item);
                }
                else {
                    item = {id: data.id, title: data.title, completed: 0, order: data.order};
                    //console.log(item);
                }
                this.$http.patch('/api/items/' + id, item);

                setTimeout(function () {
                    vm.fetchItem();
                }, 200);
            });
        },

        //EditItem: function (id) {
        //    var item = this.newItem;
        //
        //    this.newItem = {title: '', completed: '', order: ''};
        //    this.$http.patch('/api/items/' + id, item);
        //    this.edit = false;
        //    this.fetchItem();
        //},

        RemoveItem: function (id) {
            this.$http.delete('/api/items/' + id);

            //Reload page
            setTimeout(function () {
                vm.fetchItem();
            }, 200);
        },

        //ShowItem: function (id) {
        //    this.edit = true;
        //    this.$http.get('/api/items/' + id, function (data) {
        //        this.newItem = new newItem
        //        this.newItem.id = data.id;
        //        this.newItem.title = data.title;
        //        this.newItem.completed = data.completed;
        //        this.newItem.order = data.order;
        //    });
        //},

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
            setTimeout(function () {
                vm.fetchItem();
            }, 200);
        },

        dragstart: function (item, e) {
            this.draggingItem = item;
            e.target.style.opacity = 1;
        },

        dragend: function (item, e) {
            console.log("ended" + item.order);

            var allItems = vm.items;
            for (var i = 0; i < allItems.length; i++) {
                var data = allItems[i];
                var item = {id: data.id, title: data.title, completed: data.completed, order: data.order};
                this.$http.patch('/api/items/' + data.id, item);
            }
            setTimeout(function () {
                vm.fetchItem();
            }, 200);
        },

        dragenter: function (item) {
            //console.log(item.order);

            const tempIndex = item.order;
            item.order = this.draggingItem.order;
            this.draggingItem.order = tempIndex;
        }

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
        //var items = this.fetchItem();
        //console.log(items);
    }
});