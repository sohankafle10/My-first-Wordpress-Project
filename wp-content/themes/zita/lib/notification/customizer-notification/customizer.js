jQuery(document).ready(function($) {
    function handlePluginAction(pluginSlug, action) {
        let activetext = '';
        if (action == 'install') {
            activetext = 'Installing...';
        }
        else{
            activetext = 'Activating...';
        }
        $('.ts-themehunk-custom-section span.text').text(activetext);
        $('.ts-themehunk-custom-section .th-loader').css("display", "inline-block");
        $.ajax({
            url: theme_data_customizer.ajax_url,
            type: 'POST',
            data: {
                action: 'zita_install_and_activate_callback',
                security: theme_data_customizer.security,
                plugin_slug: pluginSlug
            },
            success: function(response) {
                if (response) {
                    $('#go-to-starter-sites').prop('disabled', false);
                     // $('#go-to-starter-sites').show();
                     // $('.ts-themehunk-custom-section button:nth-of-type(1)').prop('disabled', true).hide();
                     window.location.href = theme_data_customizer.redirectUrl;
                     $('.ts-themehunk-custom-section .th-loader').hide();
                } else {
                    alert('Error: ' + response.data.message);
                }
            },
            error: function(xhr, status, error) {
                $('.ts-themehunk-custom-section .th-loader').hide();
                console.error('Error:', error);
            }
        });
    }

    $('#activate-zita-pro').on('click', function(event) {
        event.preventDefault();
        var pluginSlug = $(this).data('slug');
        handlePluginAction(pluginSlug, 'activate');
    });

    $('#activate-zita-site-library').on('click', function(event) {
        event.preventDefault();
        var pluginSlug = $(this).data('slug');
        handlePluginAction(pluginSlug, 'activate');
    });

    $('#install-zita-site-library').on('click', function(event) {
        event.preventDefault();
        var pluginSlug = $(this).data('slug');
        handlePluginAction(pluginSlug, 'install');
    });

    $('#go-to-starter-sites').on('click', function(event) {
        event.preventDefault();
        window.location.href = theme_data_customizer.redirectUrl;
    });
});


