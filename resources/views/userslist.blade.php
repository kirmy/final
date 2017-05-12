<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    <div class="container" id="rest-client" v-cloak>
            <h1 class="text-center">@{{ message }}</h1>
	    <!--@{{ users }}-->
        <div class="panel panel-info" v-for="user in users">
		<!--{{route('users.show', ['user' => Auth::user()->login] )}}-->
            <a v-bind:href="userURL(user)" >
                @{{ user.login }}
            </a>
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
                    users: [],
                    newUser: {
                        name: '',
                        link: ''
                    },
                    editedUser: null,
                    errors: {
                        name: '',
                        link: ''
                    },
                },
                computed: {
                },
                methods: {
                    userURL: function(user) {
                        return '/users/' + user.login;
                    },
                    showEditForm: function(user) {
                        if (this.editedUser === null) return false;
                        return this.editedUser.id === user.id;
                    },
                    editUser: function(user) {
                        if (this.editedUser) {
                           this.editedUser = null;
                           return;
                        }
                        this.editedUser = user;
                    },
                    getUsers: function() {
                        this.$http.get('/users').then(response => {
			    // console.log(response.body, this.items);
                            this.users = response.body;
			    // console.log(this.items);
                            this.errors = {
                                login: '',
                                //link: ''
                            };
                        });
                    },
                    postUser: function() {
                        this.$http.post('/users', this.newUser).then(function(response) {
                            dd(123);
                            this.getUsers();
                            this.newUser.name = "";
                            this.newUser.link = "";
                        }, function(response) {
                            this.errors = response.body;
                        });
                    },
                    deleteUser: function(user) {
                        this.$http.delete('/users/' + user.id).then(function() {
                            this.getUsers();
                        });
                    },
                    putUser: function() {
                        this.$http.put('/users/' + this.editedUser.id, this.editedUser).then(function() {
                            this.editedUser = null;
                            this.getUsers();
                        });
                    }
                }
            });
            app.getUsers();
        </script>  

</body>
</html>
