//var app = require('express')();
var http = require('http').Server();
var io = require('socket.io')(http);

var Redis = require('ioredis');
var redis = new Redis(); 

redis.subscribe('info-channel');
// console.log(redis);
redis.on('message', function(channel, message) {
	var received = JSON.parse(message);
	console.log('JSON.parse' + ' message=' + received.message + ' data.login=' + received.data.login);
	io.emit(channel + ':' + received.message, received.data);

	// if (received.message == 'processingOrder') {
	// 	var newTimer = {
	// 		order_id: received.content.order_id,
	// 		time: received.content.data
	// 	}
	// 	timers.push(newTimer);
	// }

}); 

// app.get('/', function(req, res){
//   res.sendFile(__dirname + '/index.html');
// });
//"{{ route('profiles.update', $login) }}
// io.on('connection', function(socket){
//   console.log('a user connected');
//   socket.on('disconnect', function(){
//     console.log('user disconnected');
//   });
// });

// io.on('connection', function(socket){
//   //io.emit('chat message', 'a user connected'); 
//   socket.broadcast.emit('hi');
//   socket.on('edit message', function(msg){
//     console.log('Профиль\'' + msg + '\'изменен');
//     io.emit('edit message', msg);
//   });
//   socket.on('chat message', function(msg){
//     console.log('message: ' + msg);
//   });
//   socket.on('disconnect', function(){
//     io.emit('edit message', 'user disconnected');
//    });
// });

http.listen(3000, function(){
  console.log('listening on *:3000');
});