$(document).ready(function () {

    $(document.body).on('click', '.markViewedNotify', function () {
        var elem = $(this);
        var id = elem.attr('data-id');
        var url = elem.attr('data-url');
        $.ajax({
            type: 'POST',
            url: "affiliate-panel.aspx/NotificationMarkAsViewed",
            data: "{id: '" + id + "'}",
            contentType: 'application/json; charset=utf-8',
            dataType: "json",
            async: false,
            success: function (data2) {
                if (data2.d.toString() == "Success") {
                    if (url == "" || url == "#") {
                        elem.parent().remove();
                    }
                }
            }
        });
    });
});