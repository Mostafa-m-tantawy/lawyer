<script>
    var images = 0;




    $(document).ready(function () {



        $('#newModel').on('show.bs.modal', function (e) {

        });

        $('#updateModel').on('show.bs.modal', function (e) {
            var data =  $(e.relatedTarget).data('data');
            var url =  $(e.relatedTarget).data('url');


            $(e.currentTarget).find('input[name="name"]').val(data.name);
            $(e.currentTarget).find('input[name="specialty"]').val(data.specialty);
            $(e.currentTarget).find('input[name="address"]').val(data.address);
            $(e.currentTarget).find('form').attr('action', url);

        });

    })
</script>
