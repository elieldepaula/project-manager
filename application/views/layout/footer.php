            </div>
        </div>
    </div>
</div>
<footer class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p>&reg;<?php echo date('Y'); ?> Eliel de Paula.</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
<script>
      $(function(){
          // $('.colorpicker').colorpicker();
          $(".data").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
          // $("#hora_disparo_1").mask("99:99");
          // $("#data_disparo_2").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
          // $("#hora_disparo_2").mask("99:99");
          // Conta e limita os 160 caracteres.
          // $('#texto').keyup(function() {
          //   var len = this.value.length;
          //   if (len >= 160) {
          //     this.value = this.value.substring(0, 160);
          //   }
          //   $('#resta').text(160 - len);
          //   this.value = removeAcento(this.value);
          // });
          // Ativa o DatePicker na data de disparo 1
          $('.data').datepicker({
            dayNames: ["Domingo","Segunda-feira","Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"],
            dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"], 
            monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            dateFormat: "dd/mm/yy"
          });
          // Ativa o DatePicker na data de disparo 2
          // $("#data_disparo_2").datepicker({
          //   dayNames: ["Domingo","Segunda-feira","Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"],
          //   dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"], 
          //   monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
          //   dateFormat: "dd/mm/yy"
          // });
      });
    </script>