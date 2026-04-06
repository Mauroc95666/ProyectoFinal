<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LecturasMeteorologica $lecturasMeteorologica
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lecturas Meteorologica'), ['action' => 'edit', $lecturasMeteorologica->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lecturas Meteorologica'), ['action' => 'delete', $lecturasMeteorologica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lecturasMeteorologica->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lecturas Meteorologicas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lecturas Meteorologica'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="lecturasMeteorologicas view content">
            <h3><?= h($lecturasMeteorologica->ubicacion) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ubicacion') ?></th>
                    <td><?= h($lecturasMeteorologica->ubicacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lecturasMeteorologica->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Temperatura Actual') ?></th>
                    <td><?= $this->Number->format($lecturasMeteorologica->temperatura_actual) ?></td>
                </tr>
                <tr>
                    <th><?= __('Humedad') ?></th>
                    <td><?= $this->Number->format($lecturasMeteorologica->humedad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($lecturasMeteorologica->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($lecturasMeteorologica->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>