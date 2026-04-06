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
            <?= $this->Html->link(__('List Lecturas Meteorologicas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="lecturasMeteorologicas form content">
            <?= $this->Form->create($lecturasMeteorologica) ?>
            <fieldset>
                <legend><?= __('Add Lecturas Meteorologica') ?></legend>
                <?php
                    echo $this->Form->control('ubicacion');
                    echo $this->Form->control('temperatura_actual');
                    echo $this->Form->control('humedad');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
