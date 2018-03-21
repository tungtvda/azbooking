// var express=require("express");
// var app=express();
var server=require('http').Server();
var io=require("socket.io")(server);
server.listen(3000);
io.on("connection",function (socket) {
    console.log(socket.id);
    socket.on("disconnect",function () {
        console.log(socket.id+' ngắt kết nối')
    })
});