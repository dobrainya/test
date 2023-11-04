(function (w, d) {
    let wrapper, spinner, imgID, commonHandler, imgEl;

    spinner = $('#img-spinner');
    wrapper = $('#img-elem');


    commonHandler = ({imgId: id, imgSrc: src}) => {
        if (!Number.isInteger(id)) {
            throw new Error('Invalid image identifier');
        }

        if (typeof src !== 'string' || src === '') {
            throw new Error('Undefined image source');
        }

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
