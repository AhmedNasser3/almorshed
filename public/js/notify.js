document.addEventListener('DOMContentLoaded', function() {
    const home_alarm = document.querySelector('.home_alarm');
    const toggleButton = document.getElementById('home_toggle');
    toggleButton.addEventListener('click', function(event) {
        event.preventDefault();
        home_alarm.classList.toggle('show');
    });
});

// document.addEventListener('DOMContentLoaded', function() {
//     const home_alarm = document.querySelector('.home_alarm');
//     const toggleButton = document.getElementById('home_toggle');
//     const isAlarmVisible = localStorage.getItem('home_alarm_visible') === 'true';
//     if (isAlarmVisible) {
//         home_alarm.classList.add('show');
//     }
//     toggleButton.addEventListener('click', function(event) {
//         event.preventDefault();
//         const isVisible = home_alarm.classList.toggle('show');
//         localStorage.setItem('home_alarm_visible', isVisible);
//     });
// });
