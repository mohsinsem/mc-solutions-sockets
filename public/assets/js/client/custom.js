
var loader = "<div class='d-flex justify-content-center'>\n\
<div class='fa fa-spinner fa-spin fa-stack-2x fa-fw' role='status' >\n\
<span class='sr-only'></span></div>&emsp;"+ trans('Processing...') + "</div>";

function trans(key) {
    var trans = JSON.parse(translations);
    return (trans[key] != null ? trans[key] : key);
}

function reload_page(timer=3000){
	setTimeout(function() {
		location.reload();
	}, timer);
}
function showloadergif() {
    $('.loader-demo-box').removeClass('d-none');
}
function hideloadergif() {
    $('.loader-demo-box').addClass('d-none');
}
function showloaderdots() {
    $('.loader').removeClass('d-none');
    //$('body').addClass('blurbg');
}

function hideloaderdots() {
    $('.loader').addClass('d-none');
    //$('body').removeClass('blurbg');
}
function showloader() {
    $('.loader-gif').removeClass('d-none');
    //$('.loader').removeClass('d-none');
    $('.content-wrapper').addClass('blurbg');
}

function hideloader() {
    //$('.loader').addClass('d-none');
        setTimeout(function () {
            $('.loader-gif').addClass('d-none');
            $('.content-wrapper').removeClass('blurbg');
        }, 1000);        
}

function initializeSwtich() {
    $(function () { $('.make-switch')['bootstrapSwitch']() })
}

$(document).ready(function () {
    $('textarea').each(function () {
        $(this).val($(this).val().trim());
    });
});

(function ($) {
    showSuccessToast = function (message) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Success',
            text: message,
            showHideTransition: 'slide',
            icon: 'success',
            loaderBg: '#f96868',
            position: 'top-right'
        })
    };

    showDangerToast = function (message,timer=5000) {
        
        resetToastPosition();
        $.toast({
            heading: 'Danger',
            text: message,
            showHideTransition: 'slide',
            icon: 'error',
            loaderBg: '#f2a654',
            position: 'top-right',
			hideAfter: timer
        })
    };
    resetToastPosition = function () {
        $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
        $(".jq-toast-wrap").css({
            "top": "",
            "left": "",
            "bottom": "",
            "right": ""
        }); //to remove previous position style
    }
})(jQuery);


//delete
$(document).on('click', '.deletecentral', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var table = $(this).attr('data-table');
    var column = $(this).attr('data-column');

    Swal.fire({
        title: trans("Are you sure to delete record ?"),
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: trans("Delete"),
        cancelButtonText: trans("Cancel"),
        closeOnConfirm: false
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: 'POST',
                url: db_url + "general/delete",
                data: { 'id': id, 'table': table, 'column': column },
                beforeSend: function () {
                    showloader();
                },
                success: (data) => {
                    //hideloader();
                    showSuccessToast('Deleted successfully')
                },
                complete: function () {
                    setTimeout(function () {
                        hideloader();
                        $('.btn').attr('disabled', false);
                        $('#row_' + id).fadeOut('slow');
                    }, 1500);
                },
                error: function (data) {
                    console.log(data);
                }
            });

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
});

//delete
$(document).on('click', '.serviceId', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        type: 'POST',
        url: db_url + url,
        data: { 'id': id },
        beforeSend: function () {
            showloadergif();
        },
        success: (data) => {
            setTimeout(function () {
                hideloadergif();

                $(".orderText").addClass('d-none');
                $("#card-body").addClass('alert alert-info');
                $(".serviceName").addClass('alert alert-info');
				$(".orderServiceForm").html(data['formhtml']);
				 
                if(typeof(data['record']['ServiceTitle']) != "undefined" && typeof(data['record']['ServiceTitle']) !== null) { 

                    $(".serviceName").html('<strong> Service Name: </strong> ' + data['record']['ServiceTitle']);
					$("#serviceId").val(data['record']['ServiceId']);

                    $("#card-body").html((typeof (data['record']['MustRead']) != "undefined") ? data['record']['MustRead'] : data['record']['ServiceDetail']);

                }
                else {

                    $(".serviceName").html('<strong> Service Name: </strong> ' + data['record']['ServerServiceTitle']);
					$("#serviceId").val(data['record']['ServerServiceId']);

                    $("#card-body").html((typeof (data['record']['MustRead']) != "undefined") ? data['record']['MustRead'] : data['record']['ServerServiceDetail']);

                }
                
                if(data.showBulk == true)
                    $("#bulk-prices").html(data['htmlBulk']);

				
				$(".form-check label").append('<i class="input-helper"></i>');
				
            }, 1000);
        },
        complete: function () {

        },
        error: function (data) {
            console.log(data);
        }
    });

});

// search
$(document).on('change', '#groups', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: db_url + serviceSearchURL,
        data: { 'filter_group': $(this).val() },
        beforeSend: function () {
            showloadergif();
        },
        success: (data) => {
            setTimeout(function () {
                hideloadergif();
                $('#rowservcesearch').html(data);
            }, 1000);
        },
        complete: function () {

        },
        error: function (data) {
            console.log(data);
        }
    });

});
$(document).on('input', '#serviceSearch', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: db_url + serviceSearchURL,
        data: { 'filter_name': $(this).val() },
        beforeSend: function () {
            showloadergif();
        },
        success: (data) => {
            setTimeout(function () {
                hideloadergif();
                $('#rowservcesearch').html(data);
            }, 1000);
        },
        complete: function () {

        },
        error: function (data) {
            console.log(data);
        }
    });

});



///checked or unchecked
$(document).on('click', '.allchecked', function (e) {

    if ($('.allchecked:checked').length > 0) {
        $('.checked').attr('checked', true);
    } else {
        $('.checked').removeAttr('checked', false);
    }

});

$(document).on('click', '.getReason', function (e) {

    var orderId = $(this).attr('data-id');
    var reason = $('#Reason_'+orderId).html();
    
    Swal.fire({
        title: 'Verification Reason on Order #' + orderId,
        html: reason,
        showDenyButton: false,
        showCancelButton: false,
        confirmButtonText: 'Ok',
        closeOnConfirm: true
      })
});
