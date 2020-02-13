// Load More Button
jQuery(function($){
    $('.ciy_loadmore').click(function(){
        var button = $(this),
            data = {
                'action': 'loadmore',
                'query': ciy_loadmore_params.posts,
                'page': ciy_loadmore_params.current_page
            };
            $.ajax({
                url: ciy_loadmore_params.ajaxurl,
                data : data,
                type : 'POST',
                beforeSend : function(xhr){
                    button.text('Loading...');
                },
                success : function(data){
                    if(data){
                        button.text('More posts').prev().after(data);
                        ciy_loadmore_params.current_page++;

                        if (ciy_loadmore_params.current_page == ciy_loadmore_params.max_page)
                            button.remove();
                            // $(document.body).trigger('post-load);
                    } else {
                        button.remove();
                    }
                }
            });
    });
});