let menuId = 0;

jQuery(function ($) {
    $('.like').on('click', function () {
        event.preventDefault();
        menuId = event.target.parentNode.dataset['menuid'];
        var isLike = event.target.previousElementSibling == null;

        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {isLike: isLike, menuId: menuId, _token: token},
        })
            .done(function () {
                event.target.innerText = isLike ? event.target.innerText === 'Like' ? 'Liked!!!' : 'Like' : event.target.innerText === 'DisLike' ? 'DisLiked!!!' : 'Like';
                if (isLike) {
                    event.target.nextElementSibling.innerText = 'Dislike';
                } else {
                    event.target.nextElementSibling.innerText = 'Like';
                }
            });
    });
});
