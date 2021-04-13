<?php


 class Calcolatrice {

     public $risultato;

     public function start($integer) {

         $this -> risultato = $integer;

     }

     public function sum($integer) {

         $this -> risultato += $integer;
     }

     public function sub($integer) {

         $this -> risultato -= $integer;

     }

     public function mol($integer) {

         $this -> risultato *= $integer;

     }

     public function div($integer) {

         $this -> risultato /= $integer;

     }

     public function result() {

         return $this->risultato;

     }

 }


 $calcolatrice = new Calcolatrice;
 $calcolatrice->start(5);
 $calcolatrice->sum(1);
 $calcolatrice->sub(3);
 $calcolatrice->mol(2);
 $calcolatrice->div(4);
 $risultato = $calcolatrice->result();

 ?>

 <html>
 <head>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 @@ -65,7 +10,7 @@ public function result() {
 </style>
 <script>

 $( document ).ready(function() {
 $(document).ready(function() {

     $(document).on("click","button",function(){

 @@-79,22 +24,26 @@ public function result() {
             $("button").removeClass("pushed");
             $(this).addClass("pushed");

             /* $.ajax({
                 method: "POST",
                 url: "esercizio.php",
                 data: { operator: $(this).val() }
             })
             .done(function( data ) {
                 $("#risultato").val(data);
             }); */

         } else {

             if($("button.pushed").length > 0) {

                 $.ajax({
                     method: "POST",
                     url: "ajax.php",
                     data: { actual: $("#risultato").val(), operator: $("button.pushed").val(), integer: $(this).val() }
                 })
                 .done(function( data ) {
                     $("#risultato").val(data);
                 });
             }

             $("button").removeClass("pushed");
             $("#risultato").val($(this).val());
         }
     });

         }

     });

 });

</script>
</head>
<div class="container">
    <h3>Calcolatrice</h3>
    <p>La mia calcolatrice artiginale</p>
    <div class="row">
        <div class="offset-3 col-6">
            <table class="table table-bordered text-center">
                <tr>
                    <td><button class="btn btn-primary" value="7">7</button></td>
                    <td><button class="btn btn-primary" value="8">8</button></td>
                    <td><button class="btn btn-primary" value="9">9</button></td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary" value="4">4</button></td>
                    <td><button class="btn btn-primary" value="5">5</button></td>
                    <td><button class="btn btn-primary" value="6">6</button></td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary" value="1">1</button></td>
                    <td><button class="btn btn-primary" value="2">2</button></td>
                    <td><button class="btn btn-primary" value="3">3</button></td>
                </tr>
            </table>
        </div>
        <div class="offset-3 col-6">
            <table class="table table-bordered text-center">
                 <tr>
                     <td><button class="btn btn-primary" value="sum">+</button></td>
                     <td><button class="btn btn-success" value="sub">-</button></td>
                     <td><button class="btn btn-warning" value="mol">x</button></td>
                     <td><button class="btn btn-secondary" value="mol">x</button></td>
                     <td><button class="btn btn-danger" value="div">÷</button></td>
                 </tr>
             </table>
        </div>
    </div>
    <div class="row">
        <div class="col-4 offset-4">
            <input class="form-control" type="text" id="risultato" value="<?php echo $risultato ?? ''; ?>" />
        </div>
    </div>
</div>
</html>