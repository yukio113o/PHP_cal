<footer class="footer py-3 mt-auto bg-light">
    <div class="container text-center">
        <span class="text-muted">&copy; <?= APP_NAME; ?></span>
    </div>
</footer>

<!-- JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/ja.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>

<script>
    $(function() {
        $('#ymPicker').datetimepicker({
            format: 'YYYY-MM',
            locale: 'ja'
        });

        $('.task-datetime').datetimepicker({
            dayViewHeaderFormat: 'YYYY年 MMMM',
            format: 'YYYY/MM/DD HH:mm',
            locale: 'ja',
        });

        $('#selectColor').bind('change', function() {
            $(this).removeClass();
            $(this).addClass('form-select').addClass($(this).val());
        });

        $('.search-date').datetimepicker({
                format: 'YYYY/MM/DD',
                locale: 'ja'
        });

        const ua = navigator.userAgent;
        if((ua.indexOf('iPhone') > 0 || ua.indexOf('iPad') > 0 || ua.userAgent('Andrid') > 0) && ua.indexOf('Mobile') > 0) {
            $('input[name="ym"]').removeAttr('id').attr('type', 'month');
            $('input["name=start_datetime"], input["name=end_datetime"]').removeClass('task-datetime').attr('type', 'datetime-local');
            $('input["name=start_date"], input["name=end_date"]').removeClass('search-date').attr('type', 'date');
            $('.visually-hidden').removeClass('visually-hidden').addClass('form-label');
        } else {
            $('.sp-label').remove();
        }

        $('input[name=ym]').focus(function() {
            $('.sp-label').hide();
        }).blur(function() {
            if(!$(this).val()) {
                $('.sp-label').show();
            }
        });
    });
</script>