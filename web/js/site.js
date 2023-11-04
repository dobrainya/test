(function (w, d) {
    let wrapper, spinner, imgID, commonHandler;

    spinner = $('#img-spinner');
    wrapper = $('#img-elem');

    commonHandler = ({imgId: id, imgSrc: src}) => {
        imgID = id;
        wrapper.attr('src', src);
    };

    function fetchImg () {
        request('/api/img/get', {}, commonHandler, 'GET');
    }

    function actionRequest(url) {
        request(url, {}, commonHandler);
    }

    function request(url, data, successFn, type) {
        spinner.removeClass('d-none');
        wrapper.addClass('d-none');

        $.ajax({
            url: url,
            data: data || {},
            type: type || 'POST',
            dataType: 'json',
        })
            .done(successFn)
            .fail(({status: status, statusText: statusText}) => {
                alert(statusText);
            })
            .always(() => {
                spinner.addClass('d-none');
                wrapper.removeClass('d-none');
            });
    }

    $('#approve-img').click(() => actionRequest(`/api/img/approve/${imgID}`));
    $('#reject-img').click(() => actionRequest(`/api/img/reject/${imgID}`));

    fetchImg();
})(window, document)
