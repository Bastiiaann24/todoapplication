var vm = new Vue({

    el: '#ItemsController',

    data: {
      newItem: {
          id: '',
          title: '',
          description: '',
          completed: '',
          order: ''
      },

        success: false,
        edit: false
    },

    methods: {
        fetchItem: function() {
            this.$http.get('/api/items', function (data) {
                this.$set('items', data);
            });
        },

        EditItem: function(id) {
            var item = this.newItem;

            this.newItem = {title:'', description:'',completed:'',order:'' };
            this.$http.patch('/api/items/' + id, item);
            this.fetchItem();
            this.edit = false;
            this.fetchItem();
        },

        RemoveItem: function(id) {
            var Confirmbox = confirm("Are you sure?");
            this.$http.delete('/api/items/' + id);
            this.fetchItem();
        },

        ShowItem: function (id){
            this.edit = true;
            this.$http.get('/api/items/' + id, function (data) {
                this.newItem.id = data.id;
                this.newItem.title = data.title;
                this.newItem.description = data.description;
                this.newItem.completed = data.completed;
                this.newItem.order = data.order;
            });
        },

        AddNewItem: function () {
            //User input
            var item = this.newItem;

            //Clear form
            this.newItem = {title:'', description:'',completed:'',order:'' }

            //Send post request
            this.$http.post('/api/items', item);

            //Show success message
            self = this;
            this.succes = true;
            setTimeout(function () {
                self.success = false;
            }, 5000);

            //Reload page
            this.fetchItem();
        }
    },

    computed: {
        validation: function() {
            return {
                title: !!this.newItem.title.trim(),
                description: !!this.newItem.description.trim(),
            }
        },

        isValid: function() {
            var validation = this.validation;
            return Object.keys(validation).every(function(key) {
                return validation[key];
            })
        }
    },

    ready: function () {
        this.fetchItem();
    }
});