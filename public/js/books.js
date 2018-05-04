$(document).ready(function() {
    $('.btn-delete').click(deleteBook);
});

var deleteBook = function (e) {
    e.preventDefault();

    var id = this.dataset.id;
    var options = {
        url: $('#form-delete-' + id).attr('action'),
        method: 'DELETE',
        dataType: 'json',
        data: {
            _token: $('[name=_token]').val()
        },
        success: deleteBookSuccess,
        error: deleteBookError
    };

    console.log(options);

    $.ajax(options);
}

var deleteBookSuccess = function (data, textStatus, jqXHR) {
    console.log({
        data: data,  
        textStatus: textStatus,
        jqXHR: jqXHR
    });

    if (data.success) {
        alert('The book was asynchronous deleted. ¡Refresh! (F5)');
    }
    else {
        var message = '¡Whoops! Async error.';
        if (data.message) {
            message += ' ' + data.message;
        }    
        alert(message);    
    }
}

var deleteBookError = function (jqXHR, textStatus, errorThrown) {
    console.log({
        jqXHR: jqXHR, 
        textStatus: textStatus, 
        errorThrown: errorThrown
    });
    var message = '¡Whoops! Async error.';
}