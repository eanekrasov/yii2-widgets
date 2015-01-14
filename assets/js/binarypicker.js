(function ($) {
    $(function () {
        var context = $('.binary-picker');
        var input = $('> input', context);
        var expert = $('input[name=expert]', context);
        if (typeof expert !== undefined) {
            input.toggle(expert[0].checked);
        }

        expert.change(function (e) {
            input.toggle(this.checked);
        });
        $('.container input[type=checkbox]', context).change(function (e) {
            var value = parseInt(input.val());
            if (isNaN(value)) {
                value = 0;
            }

            var part = parseInt($(this).data('value'));
            value = (this.checked) ? value | part : value &~ part;
            input.val(value);
        });
    });
})(jQuery);