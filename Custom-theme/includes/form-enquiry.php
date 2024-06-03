<div id= "success_message" class="alert alert-success" style="display: none;"></div>
<form id="enquiry">
    <h2>send an enquiry about <?php the_title();?></h2>
    <?php echo wp_create_nonce('test');?>
    
    <div class="form-group row">
        <div class="col-lg-6">
            <input type="text" name="fname" placeholder="First Name" required>

            </=>
            <div class="col-lg-6">
            <input type="text" name="lname" placeholder="Last Name" required>
                
            
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <input type="email" name="email" placeholder="Email Address" required>

            <div class="col-lg-5">
            <input type="tel" name="phone" placeholder="Phone" required>
                
            
        </div>
    </div>

    <div class="form-group">
        <textarea name="enquiry" class="form-control" placeholder="Your Enquiry"></textarea>
    </div>

    
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Your Enquiry</button>
    </div>
</form>

<script>
    (function($){
        $('#enquiry').submit(function(event){
        event.preventDefault();

        var endpoint = "<?php echo admin_url('admin-ajax.php');?>";
        var form = $('#enquiry').serialize();

        var formData = new FormData;

        formData.append('action','enquiry');
        formData.append('nonce','<?php echo wp_create_nonce('ajax-nonce');?>');
        formData.append('enquiry', form);

        $.ajax(endpoint, {
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res){
                    $('#enquiry').fadeOut(200);
                    $('#success_message').text('Thanks for your Enquiry').show();
                    $('#enquiry').trigger('reset');
                    $('#enquiry').fadeIn(500);
                    
            },
            error:function(err){
                        alert(err.responseJSON.data);
            }
        })
     })
    })(jQuery)
</script>