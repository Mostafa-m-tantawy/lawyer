<script>
    var images = 0;




    $(document).ready(function () {



        $('#newModel').on('show.bs.modal', function (e) {

        });

        $('#updateModel').on('show.bs.modal', function (e) {
            var data =  $(e.relatedTarget).data('data');
            var url =  $(e.relatedTarget).data('url');


            $(e.currentTarget).find('input[name="name"]').val(data.name);
            $(e.currentTarget).find('input[name="email"]').val(data.email);
            $(e.currentTarget).find('input[name="phone"]').val(data.phone);
            $(e.currentTarget).find('input[name="address"]').val(data.address);
            $(e.currentTarget).find('input[name="national_id"]').val(data.national_id);
            $(e.currentTarget).find('input[name="passport_id"]').val(data.passport_id);
            $(e.currentTarget).find('input[name="profession_id"]').val(data.profession_id);
            $(e.currentTarget).find('input[name="profession"]').val(data.profession);
            $(e.currentTarget).find('input[name="starting_date"]').val(data.starting_date);
            $(e.currentTarget).find('input[name="salary"]').val(data.salary);

            $(e.currentTarget).find('form').attr('action', url);

        });

    })
</script>
