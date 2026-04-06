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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lecturasMeteorologica->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lecturasMeteorologica->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Lecturas Meteorologicas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="lecturasMeteorologicas form content">
            <?= $this->Form->create($lecturasMeteorologica) ?>
            <fieldset>
                <legend><?= __('Edit Lecturas Meteorologica') ?></legend>
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
