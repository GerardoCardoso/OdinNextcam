var today = new Date();
var hourNow = today.getHours();
var greeting;

if (hourNow > 18) {
    greeting = 'Buena noche, favor de introducir su clave';
} else if (hourNow > 12) {
    greeting = 'Buena tarde, favor de introducir su clave';
} else if (hourNow > 0) {
    greeting = 'Buen día, favor de introducir su clave';
} else {
    greeting = 'Bienvenido, favor de introducir su clave';
}

document.write('<h3>' + greeting + '</h3>');