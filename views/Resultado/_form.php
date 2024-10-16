<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Resultado $model */
/** @var yii\widgets\ActiveForm $form */
?>

<style>
    body {
        background-color: #f8f9fa;
    }
    .header {
        border-bottom: 0.3px solid grey;
        color: rgb(0, 0, 0);
        padding: 10px;
        text-align: center;
    }

    .btn:hover {
        background-color: #38A800;
    }


    .card {
        border-radius: 15px;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.4);
    }
</style>

<div class="container-fluid mt-4">
    
    <div class="d-flex justify-content-center my-3 mt-5">
    <?= Html::a('<i class="bi bi-list-ul"></i> Lista de Resultados', ['index'], ['class' => 'btn btn-outline-success mx-2', 'escape' => false]) ?>
   
</div>

    <div class="d-flex justify-content-center" style="margin-top: 50px; margin-bottom: 50px">
        <div class="card p-4" style="width: 500px;">
            <h5 class="text-center pb-3">Resultados</h5>

            <?php $form = ActiveForm::begin(); ?>

            <div class="mb-3" style="border-top: 0.3px solid grey;">
                <?= $form->field($model, 'nombre')->textInput([
                    'maxlength' => true,
                    'class' => 'form-control',
                    'oninput' => "this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')",
                    'placeholder' => 'Nombre del Resultado'
                ])->label('Nombre', ['class' => 'form-label pt-3']); ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'horas')->textInput([
                    'maxlength' => 3,
                    'class' => 'form-control',
                    'oninput' => "this.value = this.value.replace(/[^0-9]/g, '')",
                    'placeholder' => 'Cantidad de Horas'
                ])->label('Horas', ['class' => 'form-label']); ?>
            </div>

                <div class="mb-3">
        <label class="form-label">Competencia</label>
        <input type="text" id="competencia-input" class="form-control" placeholder="Seleccione o escriba una competencia" oninput="filterCompetencias()">
        <div id="competencias-list" class="list-group" style="display: none; position: absolute;"></div>
        <?= $form->field($model, 'id_com_fk')->hiddenInput()->label(false); ?>
    </div>


            <div class="d-flex justify-content-center mt-3">
                <?= Html::submitButton('Guardar', [
                    'class' => 'btn btn-outline-success',
                    'style' => 'padding: 7px 20px; border-radius: 5px;'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script>
const competencias = <?= json_encode($competencias) ?>; // Suponiendo que ya tienes la variable competencias en tu vista
const input = document.getElementById('competencia-input');
const list = document.getElementById('competencias-list');

function filterCompetencias() {
    const value = input.value.toLowerCase();
    list.innerHTML = '';
    list.style.display = 'none';

    if (value) {
        const filtered = Object.entries(competencias).filter(([key, name]) => name.toLowerCase().includes(value));
        if (filtered.length > 0) {
            filtered.forEach(([id, name]) => {
                const listItem = document.createElement('div');
                listItem.className = 'list-group-item list-group-item-action';
                listItem.textContent = name;
                listItem.onclick = () => selectCompetencia(id, name);
                list.appendChild(listItem);
            });
            list.style.display = 'block';
        }
    }
}

function selectCompetencia(id, value) {
    input.value = value;
    document.getElementById('resultado-id_com_fk').value = id; // Asigna el ID de la competencia al campo oculto
    list.innerHTML = '';
    list.style.display = 'none';
}
</script>
