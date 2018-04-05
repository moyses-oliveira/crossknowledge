+function ($) {
    'use strict';
    var getAddress = function (element) {
        var $element = $(element);
        var me = this;

        me.change = function (html) {
            var value = $(this).val().replace(/_|\.|-/g, '');
            if (value.length < 8)
                return;

            $('body').faLoading();
            $.getJSON('http://apps.widenet.com.br/busca-cep/api/cep/' +  value + '.json', function (json) {
                $('[name=chrUF]').val(json.state);
                $('[name=chrCidade]').val(json.city);
                $('[name=chrBairro]').val(json.district);
                $('[name=chrLogradouro]').val(json.address);
            })
            .always(function() {
                $('body').faLoading();
            });
        };

        $element.keyup(me.change);

        return this;
    };

    $.fn.getAddress = function () {
        if (!$(this).data('plugin.getAddress'))
            $(this).data('plugin.getAddress', (new getAddress(this)));

        return $(this).data('plugin.getAddress');
    };

    $.fn.getAddress.Constructor = getAddress;

}(jQuery);
