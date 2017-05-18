@extends('layouts.app')
@section('content')

	<div class="container" id="rest-client" v-cloak>
            <h1 class="text-center">@{{ message }}</h1>
	    <!--@{{ items }}-->
            <div class="panel panel-info" v-for="user in users">
		@{{ user.login }}
            </div>
	</div>
        <script src="https://unpkg.com/vue"></script>
        <script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>

        <script>
            Vue.http.options.root = '/users';
            Vue.http.headers.common['X-CSRF-TOKEN'] = "{!! csrf_token() !!}";
            var app1 = new Vue({
                el: '#rest-client',
                data: {
                    message: "{{ asset('js/app.js') }}",
                    users: [{login:'k1'}, {login:'d2'}, {login:'test3'}],
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
			    //console.log(response.body, this.items);
                            this.users = response.body;
			    console.log(this.users[0].login);
                            this.errors = {
                                name: '',
                                link: ''
                            };
                        });
                    },
                    postItem: function() {
                        this.$http.post('/users', this.newItem).then(function(response) {
                            
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
            app1.getItems();
        </script>  
@endsection