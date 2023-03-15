$(document).ready(function() {
     // Set the date and time that the timer will count down to
        var countDownDate = new Date().getTime() + 20 * 60 * 1000; // 10 minutes
        // Update the countdown every second
        var distance = countDownDate - new Date().getTime(); // Assign initial value to distance variable
        var x = setInterval(function() {
            // Update distance variable on every iteration
            distance = countDownDate - new Date().getTime();

            // Calculate minutes and seconds from the remaining time
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the countdown timer in a HTML element with id="timer"
            document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";

            // If the countdown is finished, display "EXPIRED" and clear the interval
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
            }
            
        }, 1000); // Update every second


   function clearRadioButtons() {
       var quizForm = document.getElementById("quiz-form");
       var radioButtons = quizForm.querySelectorAll(".quiz-radio");
       for (var i = 0; i < radioButtons.length; i++) {
           radioButtons[i].checked = false;
       }
   }

   function submitFormWithListNumber(number) {
       // set the value of the hidden input field to the clicked question number
       document.getElementById("list-number-input").value = number;
       // submit the form
       document.getElementById("quiz-form").submit();

   }

    const modal = $('#exampleModal');
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    let classroom, question_id, test_id, number, selectedAnswer, isCompleted;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrf_token
        }
    });

    modal.on('click', '.btn-primary', event => {
         button = event.target;
         classroom = button.getAttribute('classroom');
         question_id = button.getAttribute('question-id');
         test_id = button.getAttribute('test-id');
         number= button.getAttribute('number');
         selectedAnswer = $('input[name=answer]:checked').val();
         isCompleted = "true";



        $.post('http://127.0.0.1:8000/quizze/store', {
            question_id: question_id,
            test_id: test_id,
            remaining_time: distance,
            check: isCompleted,
            classroom_id: classroom,
            number: number,
            answer:selectedAnswer
        }).then(function(response) {
            // Handle success
            console.log('AJAX request completed successfully');
          return window.location.href = 'http://127.0.0.1:8000/quizzes';
        }).catch(function(error) {
            // Handle failure
            console.log('AJAX request failed');
        });
        
    });

    


    // function sendAjaxRequest() {
    //     $.post('http://127.0.0.1:8000/quizze/store', {
    //         question_id: question_id,
    //         test_id: test_id,
    //         remaining_time: distance,
    //         check: isCompleted,
    //         classroom_id: classroom,
    //         number: number,
    //         answer:selectedAnswer
    //     }).then(function(response) {
    //         // Handle success
    //         console.log('AJAX request completed successfully');
    //         console.log(response);
    //     }).catch(function(error) {
    //         // Handle failure
    //         console.log('AJAX request failed');
    //         console.log(error);
    //     });
    // }

    // // Call the function once
    // sendAjaxRequest();

    // // Repeat the function every 1 second
    // setInterval(sendAjaxRequest, 1000);

    // $(window).on('beforeunload', function() {
    //     alert("HII");
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': csrf_token
    //         }
    //     });

    //     $.post('http://127.0.0.1:8000/quizze/store', {
    //         question_id: question_id,
    //         test_id: test_id,
    //         remaining_time: distance,
    //         check: isCompleted,
    //         classroom_id: classroom,
    //         number: number,
    //         answer:selectedAnswer
    //     })


    // });

    // $(window).on('beforeunload', function() {
    //     return "Are you sure you want to leave this page?";
    //   });

});
