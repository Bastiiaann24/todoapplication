var vm = new Vue({
    http: {
        root: '/root',
        headers: {
            Authorization: 'Basic YXBpOnBhc3N3b3Jk'
        }
    },


    el: '#ItemsController',

    data: {
      newItem: {
          title: '',
          description: '',
          completed: '',
          order: ''
      },

        success: false
    },

    methods: {
        fetchItem: function() {
            this.$http.get('/api/items', function (data) {
                this.$set('items', data);
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