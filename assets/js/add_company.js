
$(document).ready(function() {	

  $('#save').click(function() {
        /* Act on the event */
        
        var saveButton = $(this).html();
        var postId = $(this).data('postid');
        var theUrl = $(this).data('url');
        var theSecondUrl = $(this).data('uri');
        //$('#btnSpan').html('<b>Please Wait..</b>');

        if(saveButton.indexOf("Save for later") > -1){
            var async1 = $.ajax({
                url: theUrl,
                type: 'GET',
                success: function(data){
                    
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });

            $.when(async1).done(function(result) {
            // ... do this when things are successful ...
                if(JSON.stringify(result).indexOf('true') > -1){
                        $('#save').html('Remove');
                    }else{
                        $('#save').html('Save for later');
                    }
            });

        }else{
            var async2 = $.ajax({
                url: theSecondUrl,
                type: 'GET',
                success: function(data){
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });

            $.when(async2).done(function(result2) {
            // ... do this when things are successful ...
                if(JSON.stringify(result2).indexOf('true') > -1){ 
                        $('#save').html('Save for later');
                    }else{
                        $('#save').html('Remove');
                    }
            });
            
        }
    });

    $('#oppremove').click(function() {
        /* Act on the event */
        
        var saveButton = $(this).html();
        var theUrl = $(this).data('uri');
        var theSecondUrl = $(this).data('url');

        if(saveButton.indexOf("Save for later") > -1){
            var async1 = $.ajax({
                url: theUrl,
                type: 'GET',
                success: function(data){
                    
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });

            $.when(async1).done(function(result) {
            // ... do this when things are successful ...
                if(JSON.stringify(result).indexOf('true') > -1){
                        $('#oppremove').html('Remove');
                    }else{
                        $('#oppremove').html('Save for later');
                    }
            });

        }else{
            var async2 = $.ajax({
                url: theSecondUrl,
                type: 'GET',
                success: function(data){
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });

            $.when(async2).done(function(result2) {
            // ... do this when things are successful ...
                if(JSON.stringify(result2).indexOf('true') > -1){ 
                        $('#oppremove').html('Save for later');
                    }else{
                        $('#oppremove').html('Remove');
                    }
            });
            
        }
    });
        
});