<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('Nuevo Usuario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Usuarios') ?></h3>
	<div style="margin-bottom: 20px; background: #f4f6f9; padding: 15px; border-radius: 5px;">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <div style="display: flex; gap: 10px;">
            <?= $this->Form->control('buscar', [
                'label' => false, 
                'placeholder' => __('Buscar por nombre o correo...'), 
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
                    <th><?= $this->Paginator->sort('nombre', __('Nombre')) ?></th>
                    <th><?= $this->Paginator->sort('apellido', __('Apellido')) ?></th>
                    <th><?= $this->Paginator->sort('correo', __('Correo')) ?></th>
                    <th><?= $this->Paginator->sort('pais', __('País')) ?></th>
                    <th><?= $this->Paginator->sort('language', __('Idioma')) ?></th>
                    <th><?= $this->Paginator->sort('created', __('Creado')) ?></th>
                    <th><?= $this->Paginator->sort('modified', __('Modificado')) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->nombre) ?></td>
                    <td><?= h($user->apellido) ?></td>
                    <td><?= h($user->correo) ?></td>
                    <td><?= h($user->pais) ?></td>
                    <td><?= h($user->language) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $user->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Está seguro de eliminar el registro # {0}?', $user->id),
                            ]
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