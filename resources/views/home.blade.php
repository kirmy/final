@extends('layouts.app')
@section('content')

    <div class="container" id="rest-client" v-cloak>
            <h1 class="text-center">@{{ message }}</h1>
	    <!--@{{ items }}-->
            <div class="panel panel-info" v-for="item in items">
		@{{ item.login }}
            </div>
	</div>
        <script src="https://unpkg.com/vue"></script>
        <script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>

        <script>
            Vue.http.options.root = '/users';
            Vue.http.headers.common['X-CSRF-TOKEN'] = "{!! csrf_token() !!}";
            var app = new Vue({
                el: '#rest-client',
                data: {
                    message: 'Users',
                    items: [],
                    newItem: {
                        name: '',
                        link: ''
                    },
                    editedItem: null,
                    errors: {
                        name: '',
                        link: ''
                    },
                },
                computed: {
                },
                methods: {
                    showEditForm: function(item) {
                        if (this.editedItem === null) return false;
                        return this.editedItem.id === item.id;
                    },
                    editItem: function(item) {
                        if (this.editedItem) {
                           this.editedItem = null;
                           return;
                        }
                        this.editedItem = item;
                    },
                    getItems: function() {
                        this.$http.get('/users').then(response => {
			    // console.log(response.body, this.items);
                            this.items = response.body;
			    // console.log(this.items);
                            this.errors = {
                                name: '',
                                link: ''
                            };
                        });
                    },
                    postItem: function() {
                        this.$http.post('/users', this.newItem).then(function(response) {
                            dd(123);
                            this.getItems();
                            this.newItem.name = "";
                            this.newItem.link = "";
                        }, function(response) {
                            this.errors = response.body;
                        });
                    },
                    deleteItem: function(item) {
                        this.$http.delete('/users/' + item.id).then(function() {
                            this.getItems();
                        });
                    },
                    putItem: function() {
                        this.$http.put('/users/' + this.editedItem.id, this.editedItem).then(function() {
                            this.editedItem = null;
                            this.getItems();
                        });
                    }
                }
            });
            app.getItems();
        </script>  
@endsection