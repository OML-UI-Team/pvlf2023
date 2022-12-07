$(document).ready(function(){
    var attempted = 0;

    $(document).on('click', '.single-product-vote', function() {
        var this_btn = $(this);
        $.ajax({
            url: $('meta[name="site-url"]').attr('content')+"/php/vote.php",
            type:'post',
            data: {
                product_id: this_btn.attr('data-product-id'),
                category_id: this_btn.attr('data-category-id'),
                status: "single",
            },
            success: function(data){
                var response = JSON.parse(data);
                if(response.status == "true") {
                    $('.response_div').addClass('alert-success').show();
                    $('#response_message').text(response.message);

                    $('#product-'+this_btn.attr('data-product-id')+'-vote').text(response.total_vote +' votes');

                    $('.yellow-btn').removeAttr('data-product-id');
                    $('.yellow-btn').removeAttr('data-category-id');
                    $('.yellow-btn').removeClass('yellow-btn').removeClass('single-product-vote').addClass('gray-btn');
                    

                    this_btn.text('Voted');
                    this_btn.removeAttr('data-product-id');
                    this_btn.removeAttr('data-category-id');
                    this_btn.removeClass('gray-btn').removeClass('single-product-vote').addClass('green-btn');
                }
                if(response.status == "false") {
                    $('.response_div').addClass('alert-danger').show();
                    $('#response_message').text(response.message);
                }

                setTimeout(function() {
                    $('.response_div').removeClass('alert-success').removeClass('alert-danger').fadeOut();
                }, 5000);
            }

        });
    });

    $('#product_form').submit(function(event){
        event.preventDefault();

        var selected_book = $('input[name="product_vote[]"]:checked').length;

        if(selected_book < 1) {
            $('.response_div').addClass('alert-danger').show();
            $('#response_message').text("Please select books to vote.");

            setTimeout(function() {
                $('.response_div').removeClass('alert-success').removeClass('alert-danger').fadeOut();
            }, 4000);

            return false;
        }

        if(selected_book < 3 && attempted==0) {
            $('.response_div').addClass('alert-danger').show();
            $('#response_message').text("You can select up to 3 books to vote.");
            $('.multi-product-vote').text('Vote Anyway');
            attempted = attempted + 1;

            setTimeout(function() {
                $('.response_div').removeClass('alert-success').removeClass('alert-danger').fadeOut();
            }, 4000);

            return false;
        }
        
        $.ajax({
            url: $('meta[name="site-url"]').attr('content')+"/php/vote.php",
            type:'post',
            data: $('#product_form').serialize(),
            success: function(data){
                var response = JSON.parse(data);
                if(response.status == "true") {
                    $('.response_div').removeClass('alert-danger').addClass('alert-success').show();
                    $('#response_message').text(response.message);

                    $('.multiple-vote-area').fadeOut().remove();
                    $('input[type=checkbox]').attr('disabled', true);
                }
                if(response.status == "false") {
                    $('.response_div').removeClass('alert-success').addClass('alert-danger').show();
                    $('#response_message').text(response.message);
                }

                setTimeout(function() {
                    $('.response_div').removeClass('alert-success').removeClass('alert-danger').fadeOut();
                }, 5000);
            }

        });
    });

});