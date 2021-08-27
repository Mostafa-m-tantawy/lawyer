<script>
    var images = 0;




    $(document).ready(function () {



        $('#newModel').on('show.bs.modal', function (e) {
            var title =  $(e.relatedTarget).data('title');
            var pending =  $(e.relatedTarget).data('pending');
            var type =  $(e.relatedTarget).data('type');

            $(e.currentTarget).find('.modal-title').html(title);
            $(e.currentTarget).find('input[name="type"]').val(type);

            if(pending){
                $(e.currentTarget).find('.pendingAmount').html(pending);
                $(e.currentTarget).find('input[name="amount"]').attr('max',pending);
            }else {
                $(e.currentTarget).find('.pendingAmountdiv').hide();

            }
        });

        $('#updateModel').on('show.bs.modal', function (e) {
            var data =  $(e.relatedTarget).data('data');
            var title =  $(e.relatedTarget).data('title');
            var type =  $(e.relatedTarget).data('type');
            var pending =  $(e.relatedTarget).data('pending');
            var url =  $(e.relatedTarget).data('url');


            $(e.currentTarget).find('.modal-title').html(title);

            $(e.currentTarget).find('input[name="amount"]').val(data.amount);

          if(pending){
              $(e.currentTarget).find('.pendingAmount').html(pending);
              $(e.currentTarget).find('input[name="amount"]').attr('max',pending);
          }else {
              $(e.currentTarget).find('.pendingAmountdiv').hide();

          }
            $(e.currentTarget).find('select[name="payment_method"]').val(data.payment_method);
            $(e.currentTarget).find('input[name="payment_date"]').val(data.payment_date);
            $(e.currentTarget).find('textarea[name="note"]').val(data.note);

            $(e.currentTarget).find('form').attr('action', url);

        });

    })
</script>
