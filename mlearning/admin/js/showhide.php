<script language="javascript" src="jquery-1.3.2.min.js">
</script>
<script language="javascript">
$(document).ready(function(){
    estado=0;						   
    $("#radioOne").click(function () { 
       if(estado==0) {
         $('#paraocultar').slideUp('fast');
		 $('#radioOne').html('Click para mostrarlo');
         estado=1;
      } else {
         $('#paraocultar').slideDown('fast');
		 $('#radioOne').html('Click para ocultarlo');
         estado=0;
      }
    });
});
</script>
</head>
<body>