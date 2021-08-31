<script>
    var images = 0;




    $(document).ready(function () {



        $('#newModel').on('show.bs.modal', function (e) {
            var title =  $(e.relatedTarget).data('title');
            var pending =  $(e.relatedTarget).data('pending');
            var type =  $(e.relatedTarget).data('type');

            $(e.currentTarget).find('.modal-title').html(title);
            $(e.currentTarget).find('input[name="type"]').val(type);
            if(type == "Commission") {
                $(e.currentTarget).find('.percentagediv').show();
                $(e.currentTarget).find('input[name="amount"]').attr('readonly', true);
            }
            else {
                $(e.currentTarget).find('.percentagediv').hide();

            }
            if(pending){
                $(e.currentTarget).find('.pendingAmount').html(pending);
                $(e.currentTarget).find('input[name="amount"]').attr('max',pending);
            }else {
                $(e.currentTarget).find('.pendingAmountdiv').hide();

            }
        });

        $('input[name="percentage"]').on('input', function (e){
            var percentage=parseFloat($(this).val())/100;
            var totalAmount=parseFloat('{{$case->total_amount}}');
            $(this).parent().parent().find('input[name="amount"]').val(percentage * totalAmount)
        });

        $('#updateModel').on('show.bs.modal', function (e) {
            var data =  $(e.relatedTarget).data('data');
            var title =  $(e.relatedTarget).data('title');
            var pending =  $(e.relatedTarget).data('pending');
            var url =  $(e.relatedTarget).data('url');


            if(data.type == "Commission") {
                $(e.currentTarget).find('.percentagediv').show();
                $(e.currentTarget).find('input[name="amount"]').attr('readonly', true);
            }
            else {
                $(e.currentTarget).find('.percentagediv').hide();
            }
          if(pending){
              $(e.currentTarget).find('.pendingAmount').html(pending);
              $(e.currentTarget).find('input[name="amount"]').attr('max',pending);
          }else {
              $(e.currentTarget).find('.pendingAmountdiv').hide();
          }

            $(e.currentTarget).find('.modal-title').html(title);
            $(e.currentTarget).find('input[name="amount"]').val(data.amount);
            $(e.currentTarget).find('input[name="percentage"]').val(data.percentage);
            $(e.currentTarget).find('select[name="payment_method"]').val(data.payment_method);
            $(e.currentTarget).find('input[name="payment_date"]').val(data.payment_date);
            $(e.currentTarget).find('textarea[name="note"]').val(data.note);
            $(e.currentTarget).find('form').attr('action', url);


        });

    })
</script>
