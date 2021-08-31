<script>
    var images = 0;




    $(document).ready(function () {



        $('#newModel').on('show.bs.modal', function (e) {

            $(e.currentTarget).find('input[name="amount"]').val('{{$employee->salary}}');
        });

        $('#updateModel').on('show.bs.modal', function (e) {
            var data =  $(e.relatedTarget).data('data');
            var url =  $(e.relatedTarget).data('url');


            $(e.currentTarget).find('input[name="amount"]').val(data.amount);
            $(e.currentTarget).find('select[name="payment_method"]').val(data.payment_method);
            $(e.currentTarget).find('input[name="payment_date"]').val(data.payment_date);
            $(e.currentTarget).find('input[name="start_date"]').val(data.start_date);
            $(e.currentTarget).find('input[name="end_date"]').val(data.end_date);
            $(e.currentTarget).find('textarea[name="note"]').val(data.note);

            $(e.currentTarget).find('form').attr('action', url);

        });

    })
</script>
