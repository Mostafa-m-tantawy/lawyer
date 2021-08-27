<script>
    var images = 0;




    $(document).ready(function () {



        $('#newModel').on('show.bs.modal', function (e) {

        });

        $('#updateModel').on('show.bs.modal', function (e) {
            var data =  $(e.relatedTarget).data('data');
            var url =  $(e.relatedTarget).data('url');


            $(e.currentTarget).find('input[name="name"]').val(data.name);
            $(e.currentTarget).find('input[name="total_amount"]').val(data.total_amount);
            $(e.currentTarget).find('select[name="court_id"]').val(data.court_id);

            $(e.currentTarget).find('form').attr('action', url);

        });

    })
</script>
