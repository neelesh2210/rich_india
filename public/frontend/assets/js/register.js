$(document).ready(function () {
     $('.nospecial').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (charCode != 32)
            if (!String.fromCharCode(charCode).match(/^[a-zA-Z0-9]*$/g))
                return false;
    });

    $('.onlyNum').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (String.fromCharCode(charCode).match(/[^0-9]/g))
            return false;

    });

    $('.numWPts').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (String.fromCharCode(charCode).match(/[^0-9\.]/g))
            return false;

    });

    $('.onlyAlpha').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (!String.fromCharCode(charCode).match(/^[a-zA-Z\s]*$/g))
            return false;
    });
     

    $(document.body).on("click", ".btnSubmit", function (e) { 
        var agreed = $("#chkIAgree").prop("checked");
        if (!agreed) {
            e.preventDefault();
            Snackbar.show({ pos: 'top-right', text: 'Please accept the terms and conditions.', actionTextColor: '#fff', backgroundColor: '#ea1c1c' });
            return false;
        }

    });

    //Sys.WebForms.PageRequestManager.getInstance().add_endRequest(EndRequestHandler);
    //function EndRequestHandler(sender, args) {
    //    $('.nospecial').keypress(function (e) {
    //        var charCode = (e.which) ? e.which : event.keyCode
    //        if (charCode != 32)
    //            if (!String.fromCharCode(charCode).match(/^[a-zA-Z0-9]*$/g))
    //                return false;
    //    });

    //    $('.onlyNum').keypress(function (e) {
    //        var charCode = (e.which) ? e.which : event.keyCode
    //        if (String.fromCharCode(charCode).match(/[^0-9]/g))
    //            return false;

    //    });

    //    $('.numWPts').keypress(function (e) {
    //        var charCode = (e.which) ? e.which : event.keyCode
    //        if (String.fromCharCode(charCode).match(/[^0-9\.]/g))
    //            return false;

    //    });

    //    $('.onlyAlpha').keypress(function (e) {
    //        var charCode = (e.which) ? e.which : event.keyCode
    //        if (!String.fromCharCode(charCode).match(/^[a-zA-Z\s]*$/g))
    //            return false;
    //    });


    //    $(document.body).on("click", ".btnSubmit", function (e) {
    //        var agreed = $("#chkIAgree").prop("checked");
    //        if (!agreed) {
    //            e.preventDefault();
    //            Snackbar.show({ pos: 'top-right', text: 'Please accept the terms and conditions.', actionTextColor: '#fff', backgroundColor: '#ea1c1c' });
    //            return false;
    //        }

    //    });
    //}
});