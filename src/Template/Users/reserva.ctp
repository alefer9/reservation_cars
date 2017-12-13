<div class="col-md-12">
    <?= $this->Form->create($reserva) ?>
    <fieldset>
        <legend><?= __('Crear reserva') ?></legend>
        <div class="col-md-6">
            <div class="form-group clockpicker">
                <label for="hora">Hora reserva</label>
                <input name="hora" type="text" class="form-control">
            </div>
          <div class="form-group">
            <label for="fecha_inicio">Fecha inicio</label>
            <input name="fecha_inicio" type="text" class="form-control datepicker" id="iniciopicker">
          </div>
          <div class="form-group">
            <label for="fecha_fin">Fecha fin</label>
            <input name="fecha_fin" type="text" class="form-control datepicker" id="finpicker">
          </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('.clockpicker').clockpicker({
            'default': 'now',
            donetext: 'Listo'
        });

        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: 'today'
        });
    });
</script>


