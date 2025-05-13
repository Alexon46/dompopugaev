jQuery(document).ready(function ($) {
    function getPostsAjax(targetSection, targetPageNumber, postsPerPage) {
        let targetSectionPostType = targetSection.attr('data-post-type');

        $.ajax({
            type: 'POST',
            url: myAjax.url,
            data: {
                action: 'action_load_posts',
                postType: targetSectionPostType,
                postsPerPage: postsPerPage,
                p_num: targetPageNumber,
            },
            beforeSend: function () {
                targetSection.css('opacity', '0.5');
            },
            success: function (data) {
                targetSection.html(data);
                targetSection.css('opacity', '1');
            }
        });
    }

    // Pagination AJAX
    $(document).on('click', '.pagination-ajax[data-post-type="post"] .page-numbers, .pagination-ajax[data-post-type="post"] .page-icon', function (e) {
        e.preventDefault()

        let targetSection = $(this).closest('[data-ajax-section]');
        let postsPerPage = targetSection.attr('data-posts-per-page') || 6;

        let hrefPagination = $(this).attr('href');
        let targetPageNumber = hrefPagination.replace('?p_num=', '');
        targetPageNumber = targetPageNumber ? targetPageNumber : 1;

        var u = new Url;
        if (targetPageNumber > 1) {
            u.query['p_num'] = targetPageNumber;
        } else {
            delete u.query['p_num'];
        }
        history.pushState('', '', u);

        $.scrollTo(targetSection);
        getPostsAjax(targetSection, targetPageNumber, postsPerPage);
    });

    // Pagination Products AJAX
    // $(document).on('click', '.pagination-ajax-products .page-numbers, .pagination-ajax-products .page-icon', function (e) {
    //     e.preventDefault()

    //     let targetSection = $(this).closest('[data-ajax-section]');
    //     let postsPerPage = targetSection.attr('data-posts-per-page') || 6;

    //     let hrefPagination = $(this).attr('href');
    //     let targetPageNumber = hrefPagination.replace('?p_num=', '');
    //     targetPageNumber = targetPageNumber ? targetPageNumber : 1;

    //     var u = new Url;
    //     if (targetPageNumber > 1) {
    //         u.query['p_num'] = targetPageNumber;
    //     } else {
    //         delete u.query['p_num'];
    //     }
    //     history.pushState('', '', u);

    //     $.scrollTo(targetSection);
    //     getPostsAjax(targetSection, targetPageNumber, postsPerPage);
    // });
});