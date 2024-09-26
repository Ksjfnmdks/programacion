<?php

/** @var yii\web\View $this */

$this->title = '';
?>

    <div class="fw-bold text-center titulo fs-1 col-12">
        <p>¡Bienvenido!</p>
        
    </div>

    <div class="linea"></div>
    
    <div class="fichas col-12 d-flex flex-row">
        <div class="col-6 fichas2 ">
            <h1>Lista de Fichas</h1>
        </div>
        <div class="col-6 fichas3 d-flex flex-column">
            <h3 class="">Jornadas</h3>
            <div class="dropdown">
                <button class=" combobox dropdown-toggle border border-success fw-bolder" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="jornada">Jornadas</span>   
                    <span class="dropdown-icon "></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bolder" href="#">Mañana</a></li>
                    <li><a class="dropdown-item fw-bolder" href="#">Tarde</a></li>
                    <li><a class="dropdown-item fw-bolder" href="#">Nocturna</a></li>
                    <li><a class="dropdown-item fw-bolder" href="#">Mixta</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tabla col-12">
        <table class="table border ">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Ficha</th>
                <th scope="col">Programa</th>
                <th scope="col">Jornada</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>2673007</td>
                    <td>Análisis y desarrollo de software</td>
                    <td>Mañana</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>2673542</td>
                    <td>Desarrollo de medios gráficos y audiovisuales</td>
                    <td>Mañana</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>2670132</td>
                    <td>Gestión administrativa</td>
                    <td>Mañana</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>2673036</td>
                    <td>Gestión contable</td>
                    <td>Mañana</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>2673036</td>
                    <td>Análisis y desarrollo de software</td>
                    <td>Mañana</td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>

    <div class="col-12 paginador bg-light">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="">
                    <a class="text-white bg-success" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <li class="page-item"><a class="page-link bg-success text-white" href="#">1</a></li>
                <li class="page-item"><a class="page-link bg-success text-white" href="#">2</a></li>
                <li class="page-item"><a class="page-link bg-success text-white" href="#">3</a></li>

                <li class="page-item">
                    <a class="page-link bg-success text-white" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

