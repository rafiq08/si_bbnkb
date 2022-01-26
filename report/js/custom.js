function setDateRangePicker(input1, input2){
    $(input1).datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
    }).on("change", function(){
      $(input2).val("").datepicker('setStartDate', $(this).val());
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
    $(input2).datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
      orientation: "bottom right"
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  }

  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
