<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<div class="table-responsive">
    <h3><?= __('Autos Disponibles') ?></h3>
    <div class="row col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label for="" class="control-label">Puertas</label>
                <select class="form-control">
                    <option value="" disabled selected>Seleccione una opción</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="" class="control-label">Diesel</label>
                <select class="form-control">
                    <option value="" disabled selected>Seleccione una opción</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="" class="control-label">Tamaño</label>
                <select class="form-control">
                    <option value="" disabled selected>Seleccione una opción</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <label for="" class="control-label"></label>
            <a href="" class="btn btn-primary">Buscar</a>
           
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad Puertas</th>
                <th scope="col">Diesel</th>
                <th scope="col">Tamaño</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
                <?php if ($car->disponible): ?>
                    <tr>
                        <td><?= h($car->marca) ?></td>
                        <td><?= h($car->modelo) ?></td>
                        <td>$<?= $this->Number->format($car->precio) ?></td>
                        <td><?= h($car->puertas) ?></td>
                        <?php if ($car->diesel == 1): ?>
                            <td>Si tiene</td>
                        <?php else: ?>
                            <td>No tiene</td>
                        <?php endif ?>
                        <td><?= h($car->tamanio) ?> mm</td>
                        <td>
                            <?= $this->Html->link('Reservar', ['controller'=>'Users', 'action' => 'reserva', $car->id, $iduser], ['class'=>'btn btn-success']) ?> 
                        </td>
                    </tr>
                <?php endif ?>
            
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
