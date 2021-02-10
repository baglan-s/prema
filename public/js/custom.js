$('.presentation-action button').click(function () {
    let templateRow = $('.template-row');
    console.log($(this).data());

    if ($(this).data('type') === 'contact') {
        templateRow.hide();
        templateRow.find('input').attr('disabled', 'disabled')
    }
    else {
        templateRow.show();
        templateRow.find('input')[0].removeAttribute('disabled')
    }

    $('.feedback-form').css('display', 'flex');

    $('.cancelBtn').click(function () {
        $('.feedback-form').css('display', 'none');
    });
});

var files;

$('input[type=file]').change(function(){
    files = this.files;
});

$('#sendFeedback').click(function (e) {
    e.stopPropagation();
    e.preventDefault();

    var data = new FormData($('.presentation-form')[0]);

    axios.post('/send-feedback', data).then(function (response) {
        let message = 'Your message has been sent successfully!';
        let feedbackForm = $('.feedback-form');
        if (response.data.response.msg) {
            message = 'Error! Please try later!';
            console.log(response.data.response.msg);
        }

        feedbackForm.css('display', 'none');
        feedbackForm.find('form')[0].reset();
        alert(message);



    }).catch(function (response) {
        console.log(response);
    });
});