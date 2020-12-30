
/*global $, WebSocket, console, window, document*/
"use strict";

/**
 * Connects to Pi server and receives video data.
 */
var g_pic = '';
var client = {

    // Connects to Pi via websocket
    connect: function (port) {
        var self = this, video = document.getElementById("video");
	var pic = document.getElementById("pic");
	document.getElementById("pic").innerHTML="";
        this.socket = new WebSocket("ws://" + window.location.hostname + ":" + port + "/websocket");

        // Request the video stream once connected
        this.socket.onopen = function () {
            console.log("Connected!");
            self.readCamera();
        };

        // Currently, all returned messages are video data. However, this is
        // extensible with full-spec JSON-RPC.
        this.socket.onmessage = function (messageEvent) {
            video.src = "data:image/jpeg;base64," + messageEvent.data;
   	    //piccode = String(video.src);
	    //document.getElementById("pic").innerHTML = video.src;
            g_pic = messageEvent.data;
	};
    },

    // Requests video stream
    readCamera: function () {
        this.socket.send("read_camera");
    }
};
