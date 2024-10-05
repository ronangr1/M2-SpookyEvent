define(['jquery', 'jquery/ui'], function ($) {
    'use strict';

    $.widget('ronangr1.spookyEventScreamer', {
        _create: function () {
            const self = this
            $(document).ready(function () {
                $('a[data-spooky="true"]').click(function (e) {
                    e.preventDefault();
                    self._showScreamer()
                    setTimeout(function () {
                        window.location.href = e.currentTarget.href
                    }, 5000)
                })
            })
        },

        _showScreamer: function () {
            const audio = new Audio(this.options.audioUrl);
            audio.play().then(function () {
                console.log('SPOOKY!');
            })

            const screamerImage = $('<img />').attr('src', this.options.imageUrl)
                .css({
                    position: 'fixed',
                    top: '50%',
                    left: '50%',
                    transform: 'translate(-50%, -50%)',
                    zIndex: 9999,
                    width: '100%',
                    height: '100%'
                });

            $('body').append(screamerImage);
        }
    });

    return $.ronangr1.spookyEventScreamer;
});
