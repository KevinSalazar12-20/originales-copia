<div class="page-header">
    <h1>Alumnos</h1>
</div>

<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            <label>Alumnos</label>
            <select id="slt-alumnos" class="form-control">
                <option value="" selected>Seleccione un alumno</option>
                <?php foreach($alumnos as $a): ?>
                    <option value="<?php echo $a->id; ?>"><?php echo $a->Nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>        
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <label>Cursos asignados</label>
            <select id="slt-cursos" class="form-control"></select>
        </div>        
    </div>
</div>

<script>
    $(document).ready(function(){
        // Bloqueamos el SELECT de los cursos
        $("#slt-cursos").prop('disabled', true);
        
        // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
        $("#slt-alumnos").change(function(){
            // Guardamos el select de cursos
            var cursos = $("#slt-cursos");
            
            // Guardamos el select de alumnos
            var alumnos = $(this);
            
            if($(this).val() != '')
            {
                $.ajax({
                    data: { id : alumnos.val() },
                    url:   '?c=Alumno&a=CursosPorAlumno',
                    type:  'POST',
                    dataType: 'json',
                    beforeSend: function () 
                    {
                        alumnos.prop('disabled', true);
                    },
                    success:  function (r) 
                    {
                        alumnos.prop('disabled', false);
                        
                        // Limpiamos el select
                        cursos.find('option').remove();
                        
                        $(r).each(function(i, v){ // indice, valor
                            cursos.append('<option value="' + v.id + '">' + v.Nombre + '</option>');
                        })
                        
                        cursos.prop('disabled', false);
                    },
                    error: function()
                    {
                        alert('Ocurrio un error en el servidor ..');
                        alumnos.prop('disabled', false);
                    }
                });
            }
            else
            {
                cursos.find('option').remove();
                cursos.prop('disabled', true);
            }
        })
    })
</script>
