
var distance = 0;

function updateTimer() {
    // Update distance variable on every iteration
    var distance = countDownDate - new Date().getTime();

    // Calculate minutes and seconds from the remaining time
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Format the countdown timer value
    var timerValue = minutes + "m " + seconds + "s";

    // If the countdown is finished, display "EXPIRED"
    if (distance < 0) {
        timerValue = "EXPIRED";
    }

    // Send the updated timer value back to the main thread
    postMessage(timerValue);

    // If the countdown is not finished, schedule the next update in 1 second
    if (distance >= 0) {
        setTimeout(updateTimer, 1000);
    }
}

// Add an event listener to receive messages from the main thread
addEventListener('message', function(event) {
    if (event.data === 'start') {
        // Begin the timer
        updateTimer();
        self.postMessage(distance);
    }
});