jQuery(document).ready(function ($) {

    var sytegColorPicker = $('.ssp-chat-wordpress-setup .syteg-color-picker');
    $(sytegColorPicker).each(function (index, picker) {

        changeColors($(picker).data('target'), $(picker).val());

    });
    $(sytegColorPicker).wpColorPicker({
        mode: 'rgb',
        color: 'rgb',
        change: function (evt, ui) {
            var color = $(evt.target).val();
            changeColors(evt.target.dataset.target, color);
        }
    });
    $('.ssp-item-embed button, .ssp-item-embed input[type=button], .ssp-item-embed input[type=submit], .ssp-item-embed a').click(function (evt) {
        evt.preventDefault();
    });

    function changeColors (target, color) {
        var targetsTypes = {
            colorTargets: {
                elements: $('[data-name-color=' + target + ']'),
                property: 'color'
            },
            backgroundTargets: {
                elements: $('[data-name-background=' + target + ']'),
                property: 'background-color'
            },
            borderTargets: {
                elements: $('[data-name-border=' + target + ']'),
                property: 'border-color'
            }
        };

        for (var targetType in targetsTypes) {
            var targets = targetsTypes[targetType];
            if (targets.elements && targets.elements.length) {
                $(targets.elements).css(targets.property, color);
            }
        }

    }
});