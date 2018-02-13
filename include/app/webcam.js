/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 navigator.getUserMedia({video: true, audio: true}, success, error)

function success(stream)
{
    var video1 = document.querySelector("#video1")
    video1.src = window.URL.createObjectURL(stream)
    video1.play()
}

function error (err){
    console.log(err);
}

