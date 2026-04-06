<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\LecturaMeteorologica> $lecturasMeteorologicas
 */
?>
<div class="lecturasMeteorologicas index content">
    <?= $this->Html->link(__('Nueva Lectura'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lecturas Meteorológicas') ?></h3>
	<div style="margin-bottom: 20px; background: #f4f6f9; padding: 15px; border-radius: 5px;">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <div style="display: flex; gap: 10px;">
            <?= $this->Form->control('buscar', [
                'label' => false, 
                'placeholder' => __('Buscar por ubicación...'), 
                'value' => $buscar ?? '', 
                'style' => 'width: 300px;'
            ]) ?>
            <?= $this->Form->button(__('Buscar'), ['style' => 'margin: 0;']) ?>
            
            <?php if (!empty($buscar)): ?>
                <?= $this->Html->link(__('Limpiar'), ['action' => 'index'], ['class' => 'button button-outline', 'style' => 'margin: 0;']) ?>
            <?php endif; ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', __('ID')) ?></th>
                    <th><?= $this->Paginator->sort('ubicacion', __('Ubicación')) ?></th>
                    <th><?= $this->Paginator->sort('temperatura_actual', __('Temperatura Actual')) ?></th>
                    <th><?= $this->Paginator->sort('humidity', __('Humedad')) ?></th>
                    <th><?= $this->Paginator->sort('created', __('Creado')) ?></th>
                    <th><?= $this->Paginator->sort('modified', __('Modificado')) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lecturasMeteorologicas as $lectura): ?>
                <tr>
                    <td><?= $this->Number->format($lectura->id) ?></td>
                    <td><?= h($lectura->ubicacion) ?></td>
                    <td><?= h($lectura->temperatura_actual) ?>°C</td>
                    <td><?= h($lectura->humidity) ?>%</td>
                    <td><?= h($lectura->created) ?></td>
                    <td><?= h($lectura->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $lectura->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $lectura->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $lectura->id],
                            ['confirm' => __('¿Está seguro de eliminar el registro # {0}?', $lectura->id)]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')) ?></p>
    </div>
</div>